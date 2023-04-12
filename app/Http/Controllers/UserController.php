<?php

namespace App\Http\Controllers;

use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $users = User::with('gradebook')->get();
        // return response()->json($users);


        $name = $request->query('name');
        
        $users = User::searchByName($name)->with('gradebook')->get();
        return response()->json($users);
    }


    
    public function available()
    {
        $users = User::with('gradebook')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $gradebook = $user->gradebook;
        $student = $user->students;

        // $student = $user->gradebook->students;
        
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
