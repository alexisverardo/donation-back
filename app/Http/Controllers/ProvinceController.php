<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ProvinceController extends Controller
{
    public function index()
    {
        $provinces = Province::all();

        return Response::json($provinces->jsonSerialize(), 200);
    }

    public function store(Request $request)
    {
        $province = Province::query()->create($request->all());

        return Response::json($province->jsonSerialize(), 201);
    }

    public function show($id)
    {
        $province = Province::query()->findOrFail($id);

        return Response::json($province->jsonSerialize(), 200);
    }

    public function showLocationsProvince($province_id)
    {
        $province = Province::query()->findOrFail($province_id);

        $provinceLocations = $province->locations;

        return Response::json($provinceLocations->jsonSerialize(), 200);
    }

    public function update(Request $request, $id)
    {
        $province = Province::query()->findOrFail($id);
        $province->fill($request->all());
        $province->save();

        return Response::json($province->jsonSerialize(), 200);
    }

    public function destroy($id)
    {
        Province::query()->findOrFail($id)->delete();

        return Response::json(['status' => 'ok'], 200);
    }
}
