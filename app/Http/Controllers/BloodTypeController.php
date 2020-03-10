<?php

namespace App\Http\Controllers;

use App\BloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BloodTypeController extends Controller
{
    public function index()
    {
        $locations = BloodType::all();

        return Response::json($locations->jsonSerialize(), 200);
    }
    public function store(Request $request)
    {
        $location = BloodType::query()->create($request->all());

        return Response::json($location->jsonSerialize(), 201);
    }

    public function show($id)
    {
        $location = BloodType::query()->findOrFail($id);

        return Response::json($location->jsonSerialize(), 200);
    }

    public function update(Request $request, $id)
    {
        $location = BloodType::query()->findOrFail($id);
        $location->fill($request->all());
        $location->save();

        return Response::json($location->jsonSerialize(), 200);
    }

    public function destroy($id)
    {
        BloodType::query()->findOrFail($id)->delete();

        return Response::json(['status' => 'ok'], 200);
    }
}
