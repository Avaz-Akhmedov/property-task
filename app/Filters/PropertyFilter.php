<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PropertyFilter
{
    public static function apply(Builder $query, Request $request): Builder
    {
        if ($request->has('name')) {
            static::applyNameSearchFilter($query, $request->input('name'));
        }


        if ($request->has('priceFrom')) {
            static::applyPriceFromFilter($query, $request->input('priceFrom'));
        }

        if ($request->has('priceTo')) {
            static::applyPriceToFilter($query, $request->input('priceTo'));
        }

        if ($request->has('garages')) {
            static::applyGarageFiler($query, $request->input('garages'));
        }

        if ($request->has('storeys')) {
            static::applyStoreyFiler($query, $request->input('storeys'));
        }

        if ($request->has('bathrooms')) {
            static::applyBathroomFilter($query, $request->input('bathrooms'));
        }

        if ($request->has('bedrooms')) {
            static::applyBedroomFilter($query, $request->input('bedrooms'));
        }

        return $query;
    }


    protected static function applyNameSearchFilter(Builder $query, $name): void
    {
        $query->where('name', 'like', '%' . $name . '%');
    }


    protected static function applyPriceFromFilter(Builder $query, $priceFrom): void
    {
        $query->where('price', '>=', $priceFrom);
    }

    protected static function applyPriceToFilter(Builder $query, $priceTo): void
    {
        $query->where('price', '<=', $priceTo);
    }

    protected static function applyGarageFiler(Builder $query, $garage): void
    {
        $query->where('garages', $garage);
    }

    protected static function applyStoreyFiler(Builder $query, $storeys): void
    {
        $query->where('storeys', $storeys);
    }

    protected static function applyBathroomFilter(Builder $query, $bathrooms): void
    {
        $query->where('bathrooms', $bathrooms);
    }


    protected static function applyBedroomFilter(Builder $query, $bedrooms): void
    {
        $query->where('bedrooms', $bedrooms);
    }
}