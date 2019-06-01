<?php

namespace App\Http\Controllers;

use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    public function index()
    {
        return PersonalInformation::all();
    }

    public function show(PersonalInformation $personalInformation)
    {
        return $personalInformation;
    }

    public function store(Request $request)
    {
        $personalInformation = PersonalInformation::create($request->all());

        return response()->json($personalInformation, 201);
    }

    public function update(Request $request, PersonalInformation $personalInformation)
    {
        $personalInformation->update($request->all());
        
        return response()->json($personalInformation, 200);
    }

    public function delete(PersonalInformation $personalInformation)
    {
        $personalInformation->delete();

        return response()->json(null, 204);
    }
}