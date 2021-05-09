<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasklist;

class TasklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tasklists = Tasklist::all();
        return response()->json([
            'data' => $tasklists
        ],200);
    }


    /**
     * Store the tasklists in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // get content of request
        $newTasklists = json_decode($request->getContent(), false);
        // loop through the 3 tasklists
        for ($n = 0; $n <= 2; $n++) {
            // get a task list
            $tasklist = Tasklist::find($n+1);
            $updatedTasklist = $newTasklists[$n];
            // save the tasks
            if ($updatedTasklist->tasks !== null) {
                $tasklist->tasks = $updatedTasklist->tasks;
                $tasklist->save();
            }
        };
        return response([
            'status' => 'success',
        ], 200);
    }


}
