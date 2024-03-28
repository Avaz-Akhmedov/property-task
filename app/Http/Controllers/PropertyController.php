<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyController extends Controller
{
    //Endpoint to search properties
    //?name to search by name
    //?priceFrom to price ranges from
    //?priceTo to price ranges to
    //?bathrooms to search by bathrooms count
    //?storeys to search by storeys count
    //?garages to search by garages count
    //?bedrooms to search by bedrooms count
    public function __invoke(Request $request): ResourceCollection
    {

        $properties = Property::query()->latest()
            ->filter($request)
            ->paginate();

        return PropertyResource::collection($properties);
    }
}
