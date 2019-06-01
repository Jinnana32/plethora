<?php

namespace App\Http\Controllers;

use App\Models\Security;
use Illuminate\Http\Request;

class SecurityController extends Controller
{
    public function index()
    {
        return Security::all();
    }

    public function show(Security $security)
    {
        return $security;
    }

    public function store(Request $request)
    {
        $security = Security::create($request->all());

        return response()->json($security, 201);
    }

    public function update(Request $request, Security $security)
    {
        $security->update($request->all());
        
        return response()->json($security, 200);
    }

    public function delete(Security $security)
    {
        $security->delete();

        return response()->json(null, 204);
    }
}