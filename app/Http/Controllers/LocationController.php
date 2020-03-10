<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return Response::json($locations->jsonSerialize(), 200);
    }

    public function store(Request $request)
    {
        $location = Location::query()->create($request->all());

        return Response::json($location->jsonSerialize(), 201);
    }

    public function show($id)
    {
        $location = Location::query()->findOrFail($id);

        return Response::json($location->jsonSerialize(), 200);
    }

    public function update(Request $request, $id)
    {
        $location = Location::query()->findOrFail($id);
        $location->fill($request->all());
        $location->save();

        return Response::json($location->jsonSerialize(), 200);
    }

    public function destroy($id)
    {
        Location::query()->findOrFail($id)->delete();

        return Response::json(['status' => 'ok'], 200);
    }
}
