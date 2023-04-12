<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradebookRequest;
use App\Http\Requests\UpdateGradebookRequest;
use App\Models\Gradebook;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class GradebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /////////////staro
        $per_page = $request->query('per_page', 10);
        /////////////staro


        

        $name = $request->query('name'); /////novo 


        ///////////////novo
        $gradebooks = Gradebook::searchByName($name)->with('user')->orderByDesc('created_at')->paginate($per_page);

        /////////////////////////staro
        // $gradebooks = Gradebook::with('user')->orderByDesc('created_at')->paginate($per_page);
        //////////////

        return response()->json($gradebooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradebookRequest $request)
    {
        $gradebook = Gradebook::create($request->validated());
        return response()->json($gradebook);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gradebook = Gradebook::with('user')->with('students')->with('comments')->findOrFail($id);
        // $user = $gradebook->user;
        // $student = $gradebook->students;
       
        
        return response()->json($gradebook);
    }

    public function showByUserId(string $userId)
    {
        $gradebook = Gradebook::where('user_id', $userId)->with('user')->with('students')->with('comments')->firstOrFail();

        return response()->json($gradebook);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradebookRequest $request, $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $data = $request->validated();
        $gradebook->update($data);
        $gradebook->updateUserOnStudents();
        return response()->json($gradebook);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $gradebook->delete();
    }
}
