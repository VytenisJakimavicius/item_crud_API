<?php

namespace App\Http\Controllers;
use App\Models\items;
use Illuminate\Http\Request;
use Validator;

class itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = items::all();
        return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'items_title'=> $request->items_title,
            'items_description'=> $request->items_description,
            'items_price'=> $request->items_price,
        ];
        $rules = [
            'items_title'=> 'required',
            'items_description'=> 'required',
            'items_price'=> 'required',
        ];   
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $errors = $validator->messages()->get('*');
            $result_array = array(
                'errorMessage' => "validator fails",
                'errors' => $errors
            );
        } else {
            $items = new items;
            $items->title = $request->items_title;
            $items->description = $request->items_description;
            $items->price = $request->items_price;
            $items->save();  
        }
        return response()->json($items);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = items::find($id);
        return response()->json($item);
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
        $input = [
            'items_title'=> $request->items_title,
            'items_description'=> $request->items_description,
            'items_price'=> $request->items_price,
        ];
        $rules = [
            'items_title'=> 'required',
            'items_description'=> 'required',
            'items_price'=> 'required',
        ];   
        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $errors = $validator->messages()->get('*');
            $result_array = array(
                'errorMessage' => "validator fails",
                'errors' => $errors
            );
        } else {
            $items = items::find($id);
            $items->title = $request->items_title;
            $items->description = $request->items_description;
            $items->price = $request->items_price;
            $items->save();  
        }
        return response()->json($items);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=items::find($id);
        $item->delete();
        return response()->json(array(
            'Message' => 'Destroyed'
        ));
    }
}
