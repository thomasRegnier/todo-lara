<?php

namespace App\Http\Controllers;

use App\task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response()->json(task::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content'=>'required',

        ]);

        //
        $task = task::create($request->all());

        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task, $id)
    {
        //
        return $task->findOrfail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,task $task, $id)
    {


        $task = task::findOrFail($id);
        $request->validate([
            'content'=>'required',

        ]);
        $task->update($request->all());

    }

    /**
 * Remove the specified resource from storage.
 *
 * @param  \App\task  $task
 * @return \Illuminate\Http\Response
 */
    public function destroy(task $task, $id)
    {
        //
        $task->findOrfail($id)->delete();

    }
}
