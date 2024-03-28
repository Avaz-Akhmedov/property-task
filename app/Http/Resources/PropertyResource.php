<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'bathrooms' => $this->bathrooms,
            'bedrooms' => $this->bedrooms,
            'garages' => $this->garages,
            'storeys' => $this->storeys,
            'price' => $this->price,
        ];
    }
}
