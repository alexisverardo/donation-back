<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignDate;
use App\Location;
use App\StatusCampaign;
use App\User;
use App\UserNotifyToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CampaingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myCampaigns = StatusCampaign::where([['user_id', '=',Auth::id()], ['status', '=', false]])->get();
        $ids = [];
        foreach ($myCampaigns as $myCampaign) {
            $ids[] = $myCampaign->campaign_id;
        }
        $campaigns = Campaign::whereIn('id', $ids)->with('bloods')->with('hospital')->with('campaignDates')->get();

        return Response::json($campaigns->jsonSerialize(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $campaign = Campaign::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'qty_donants' => $request->qty_donants,
            'hospital_id' => $request->hospital_id,
            'path_dni' => ''
        ]);
        foreach ($request->blood_type_id as $id) {
            $campaign->bloods()->attach($id);
        }
        foreach ($request->date_donations as $date) {
            $init = new Carbon($date['initDate']);
            $init->format('Y-m-d H:i:s');
            $end = new Carbon($date['endDate']);
            $end->format('Y-m-d H:i:s');
            $campaign_date = new CampaignDate();
            $campaign_date->initDate = $init;
            $campaign_date->endDate = $end;
            $campaign_date->campaign_id = $campaign->id;
            $campaign_date->save();
        }

        $bloodString = '';
        foreach ($campaign->bloods as $blood) {
            $bloodString = $bloodString . ' ' . $blood->blood_type;
        }

//        $compatibility_blood_users = User::where('blood_type_id', $campaign->blood_type_id)->latest()->first();
        $tokensUser = UserNotifyToken::query()->where('user_id', '<>', Auth::id())->get();
        $tokens = [];
        foreach ($tokensUser as $token) {
            $tokens[] = $token->token;
        }

        $users = User::all();
        foreach ($users as $user) {
            StatusCampaign::create(
                [
                    'user_id' => $user->id,
                    'campaign_id' => $campaign->id,
                    'status' => false,
                    'deleted' => false,
                ]
            );
        }

        fcm()
            ->to($tokens) // $recipients must an array
            ->priority('normal')
            ->data([
                'first_name' => $campaign->first_name,
                'last_name' => $campaign->last_name,
                'bloods' => $bloodString,
                'qty_donants' => $campaign->qty_donants,
                'hospital_id' => $campaign->hospital->name,
                'id_campaign' => $campaign->id
            ])
            ->notification([
                'title' => 'SOS mi tipo notificacion',
                'body' => 'necesitamos tu ayuda',
                'sound' => 'default',
                'click_action' => 'FCM_PLUGIN_ACTIVITY',
                'icon' => 'fcm_push_icon'
            ])
            ->send();
            return response()->json($campaign, 200) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::query()->with('bloods')->with('hospital')->with('campaignDates')->findOrFail($id);

        return Response::json($campaign->jsonSerialize(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $statusCampaign = StatusCampaign::where([['campaign_id', '=' , $id], ['user_id', '=', Auth::id()]])->first();
        $statusCampaign->delete();
        return Response::json(['status' => 'ok'], 200);
    }

    public function accept($id) {
        $statusCampaign = StatusCampaign::where([['campaign_id', '=' , $id], ['user_id', '=', Auth::id()]])->first();
        $statusCampaign->status = true;
        $statusCampaign->save();
        $campaign = Campaign::find($id);
        if($campaign->qty_donants !== 0 ) {
            $campaign->qty_donants == $campaign->qty_donants - 1;
        }
        $campaign->save();
    }
}
