<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beer;

class BeerController extends Controller
{
    public function getAllBeers()
    {
        $beers = Beer::get()->toJson(JSON_PRETTY_PRINT);
        return response($beers, 200);
    }

    public function getBrewerBeers($brewerId)
    {
        $beers = Beer::where('brewer_id', $brewerId)->get()->toJson(JSON_PRETTY_PRINT);
        return response($beers, 200);
    }

    public function getBeer($id)
    {
        if (Beer::where('id', $id)->exists())
        {
            $beer = Beer::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($beer, 200);
        }
        else
        {
            return response()->json(["message" => "Beer not found"], 404);
        }
    }

    public function createBeer(Request $request)
    {
        $beer = new Beer($request->all());
        $beer->save();

        return response()->json(["message" => "Beer record created"], 201);
    }

    public function updateBeer(Request $request, $id)
    {
        if (Beer::where('id', $id)->exists())
        {
            $beer = Beer::find($id);

            $beer->name = is_null($request->name) ? $beer->name : $beer->name;
            $beer->type = is_null($request->type) ? $beer->type : $beer->type;
            $beer->fermentation = is_null($request->fermentation) ? $beer->fermentation : $beer->fermentation;
            $beer->percentage = is_null($request->percentage) ? $beer->percentage : $beer->percentage;
            $beer->purchasingPrice = is_null($request->purchasingPrice) ? $beer->purchasingPrice : $beer->purchasingPrice;
            $beer->brewer_id = is_null($request->brewer_id) ? $beer->brewer_id : $beer->brewer_id;
            $beer->save();

            return response()->json(["message" => "Beer record updated"], 200);
        }
        else
        {
            return response()->json(["message" => "Beer not found"], 404);
        }
    }

    public function deleteBeer($id)
    {
        if (Beer::where('id', $id)->exists())
        {
            $beer = Beer::find($id);
            $beer->delete();

            return response()->json(["message" => "Beer record deleted"], 202);
        }
        else
        {
            return response()->json(["message" => "Beer not found"], 404);
        }
    }
}
