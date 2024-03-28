<?php

namespace App\Models;

use App\Filters\PropertyFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
        'price',
    ];


    public function scopeFilter(Builder $query, Request $request): Builder
    {
        return PropertyFilter::apply($query,$request);
    }
}
