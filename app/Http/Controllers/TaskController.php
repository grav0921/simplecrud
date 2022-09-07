<?php

namespace App\Http\Controllers;

use App\Models\task;
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
        return view('home',['title'=>'task']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home',['title'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required|numeric|max:5'
        ]);
        // $create = $request->all();
        task::create($create);
        return redirect('show/item')->with('created','berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(task $task)
    {
        $show = $task::all();
        $showhigh = $task::orderBy('rate','DESC')->limit(3)->get();
        // $showhigh = $task::max('id');
        // $tabl=task::exists();
        // return $showhigh;
            return view('home',['title'=>'show','task'=>$show,'taskhigh'=>$showhigh]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(task $task)
    {   
        $task = task::find($task)->first();

        return view('home',['title'=>'edit','task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task $task)
    {

        $update = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required|numeric|max:5'
        ]);
        $task = task::find($task)->first();
        task::where('id',$task->id)->update($update);

        return redirect('show/item')->with('updated','update berhasil');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(task $task)
    {
        $task = task::find($task)->first();
        task::where('id',$task->id)->delete();

        return redirect('show/item')->with('deleted','hapus berhasil');
    }
}
