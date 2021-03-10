<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function  index()
    {

        return response()->json([
            'vehicles' => Vehicle::all(),
            'message' => 'List of all vehicles',
        ], 200);
    }

    public function show(Vehicle $vehicle)
    {

        return response()->json([
            'vehicle' => $vehicle,
            'message' => 'Show vehicle',
        ], 200);
    }

    public function store(VehicleRequest $request)
    {

        $data = $request->validated();
        $vehicle = Vehicle::create($data);

        return response()->json([
            'vehicle' => $vehicle,
            'message' => 'Vehicle is added',
        ], 201);
    }
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
       
        $data = $request->validated();
        $vehicle->update($data);

        return response()->json([
            'vehicle' => $vehicle,
            'message' => 'Vehicle has been updated',
        ], 200);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return response()->json([
            'message' => 'Vehicle has been deleted'
        ], 200);
    }
}
