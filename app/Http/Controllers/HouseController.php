<?php

namespace App\Http\Controllers;

use App\Models\house;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $params = $request->all();

        $name = $params['name'] ?? null;
        $bedrooms = $params['bedrooms'] ?? null;
        $bathrooms = $params['bathrooms'] ?? null;
        $storeys = $params['storeys'] ?? null;
        $garages = $params['garages'] ?? null;
        $price_from = $params['price_from'] ?? null;
        $price_to = $params['price_to'] ?? null;

        $builder = DB::table('houses');
        if ($name) {
            $builder = $builder->where('name', 'like', "%{$name}%");
        }
        if ($bedrooms) {
            $builder = $builder->where('bedrooms', '=', $bedrooms);
        }
        if ($bathrooms) {
            $builder = $builder->where('bathrooms', '=', $bathrooms);
        }
        if ($storeys) {
            $builder = $builder->where('storeys', '=', $storeys);
        }
        if ($garages) {
            $builder = $builder->where('garages', '=', $garages);
        }

        if (empty($price_from)) {
            $price_from = 0;
        }

        if (empty($price_to)) {
            $price_to = PHP_INT_MAX;
        }

        if ((float)$price_from > (float)$price_to) {
            $price_from = null;
        }

        if ($price_from === 0 || !empty($price_from)) {
            $builder->where(
                function ($query) use ($price_from, $price_to) {
                    return $query
                        ->where('price', '>=', $price_from)
                        ->where('price', '<=', $price_to);
                }
            );
        }

        return $builder->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return house::factory()->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(house $house)
    {
        return $house;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, house $house)
    {
        $house->fill($request->except(["id"]));
        $house->save();
        return response()->json($house);
    }
}
