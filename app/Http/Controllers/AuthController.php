<?php

namespace App\Http\Controllers;

use App\Donor;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::query()->create($request->input('user'));

        $token = auth()->login($user);
        if ($request->has(['donor'])) {
            $donor = new Donor();
            $donor->fill($request->input('donor'));
            $donor->user_id = $user->id;
            $donor->last_date_donation = null;
            $donor->save();
        }

        return $this->respondWithToken($token);
    }

    public function login()
    {
        $credentials = request([$this->identity(), 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return Response::json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    private function identity() {
        $identity = request()->get('identity');

        if (filter_var($identity, FILTER_VALIDATE_EMAIL)) {
            request()->merge(['email' => $identity]);
            return 'email';
        }

        request()->merge(['username' => $identity]);
        return 'username';
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 36000
        ]);
    }
}
