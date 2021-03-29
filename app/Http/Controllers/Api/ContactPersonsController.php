<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactPerson;

class ContactPersonsController extends Controller
{
    public function getAllContactPersons()
    {
        $contactPersons = ContactPerson::get()->toJson(JSON_PRETTY_PRINT);
        return response($contactPersons, 200);
    }

    public function getBrewerContactPersons($contactPersonsId)
    {
        $contactPersons = ContactPerson::where('brewer_id', $contactPersonsId)->get()->toJson(JSON_PRETTY_PRINT);
        return response($contactPersons, 200);
    }

    public function getContactPerson($id)
    {
        if (ContactPerson::where('id', $id)->exists())
        {
            $contactPerson = ContactPerson::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($contactPerson, 200);
        }
        else
        {
            return response()->json(["message" => "Contact person not found"], 404);
        }
    }

    public function createContactPerson(Request $request)
    {
        $contactPerson = new ContactPerson($request->all());
        $contactPerson->save();

        return response()->json(["message" => "Contact person record created"], 201);
    }

    public function updateContactPerson(Request $request, $id)
    {
        if (ContactPerson::where('id', $id)->exists())
        {
            $contactPerson = ContactPerson::find($id);

            $contactPerson->name = is_null($request->name) ? $contactPerson->name : $contactPerson->name;
            $contactPerson->brewer_id = is_null($request->brewer_id) ? $contactPerson->brewer_id : $contactPerson->brewer_id;
            $contactPerson->save();

            return response()->json(["message" => "Contact person record updated"], 200);
        }
        else
        {
            return response()->json(["message" => "Contact person not found"], 404);
        }
    }

    public function deleteContactPerson($id)
    {
        if (ContactPerson::where('id', $id)->exists())
        {
            $contactPerson = ContactPerson::find($id);
            $contactPerson->delete();

            return response()->json(["message" => "Contact person record deleted"], 202);
        }
        else
        {
            return response()->json(["message" => "Contact person not found"], 404);
        }
    }
}
