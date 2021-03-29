<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brewer;

class BrewerController extends Controller
{
    public function getAllBrewers()
    {
        $brewers = Brewer::get()->toJson(JSON_PRETTY_PRINT);
        return response($brewers, 200);
    }

    public function getBrewer($id)
    {
        if (Brewer::where('id', $id)->exists())
        {
            $brewer = Brewer::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($brewer, 200);
        }
        else
        {
            return response()->json(["message" => "Brewer not found"], 404);
        }
    }

    public function createBrewer(Request $request)
    {
        $brewer = new Brewer($request->all());
        $brewer->save();

        return response()->json(["message" => "Brewer record created"], 201);
    }

    public function updateBrewer(Request $request, $id)
    {
        if (Brewer::where('id', $id)->exists())
        {
            $brewer = Brewer::find($id);

            $brewer->name = is_null($request->name) ? $brewer->name : $brewer->name;
            $brewer->save();

            return response()->json(["message" => "Brewer record updated"], 200);
        }
        else
        {
            return response()->json(["message" => "Brewer not found"], 404);
        }
    }

    public function deleteBrewer($id)
    {
        if (Brewer::where('id', $id)->exists())
        {
            $brewer = Brewer::find($id);
            $brewer->delete();

            return response()->json(["message" => "Brewer record deleted"], 202);
        }
        else
        {
            return response()->json(["message" => "Brewer not found"], 404);
        }
    }
}
