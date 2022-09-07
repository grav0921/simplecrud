<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => false,
            'items'  => task::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'title'=>'required',
            'description'=>'required',
            'rate'=>'required|numeric|max:5',
        ]);
 
        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $item = new task;
            $item->name = $request->input('title');
            $item->quantity = $request->input('description');
            $item->price = $request->input('rate');
            $item->save();
     
            return response()->json([
                'error' => false,
                'item'  => $item,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = task::find($id);
 
        if(is_null($item)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }
 
        return response()->json([
            'error' => false,
            'item'  => $item,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
        ]);
 
        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $item = task::find($id);
            $item->name = $request->input('title');
            $item->quantity = $request->input('description');
            $item->price = $request->input('rate');
            $item->save();
     
            return response()->json([
                'error' => false,
                'item'  => $item,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = task::find($id);
 
        if(is_null($item)){
            return response()->json([
                'error' => true,
                'message'  => "Record with id # $id not found",
            ], 404);
        }
 
        $item->delete();
     
        return response()->json([
            'error' => false,
            'message'  => "Item record successfully deleted id # $id",
        ], 200);
    }
}
