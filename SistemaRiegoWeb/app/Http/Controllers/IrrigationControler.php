<?php

namespace App\Http\Controllers;
use App\Irrigation;
use App\Crop;

use Illuminate\Http\Request;

class IrrigationControler extends Controller
{
    //return 'Irrigations';
public function create()
{
    return view('admin.irrigation.create');
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
   $cultivo = new Irrigation();
   $cultivo-> crop_id =$request->input('crop_id');
 

   request()->validate([ 
       
       'crop_id'=>'required',
       
       
   ]);
   $cultivo->save();

   return redirect()->route('irrigation.index')
   ->with('success','Riego Iniciado');
}


/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
   $irrigation = Irrigation::find($id);
   return view('admin.irrigation.show',compact('irrigation'));
}

/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
   $irrigation = Irrigation::find($id);
   $crops = Crop::orderby('id', 'ASC')->pluck('name','id');

   return view('admin.irrigation.edit')
       ->with('irrigation', $irrigation)
       ->with('crop', $crops);
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
   request()->validate([ 
       'name'=> 'required',
       'crop_id'=>'required',

   ]);

   Irrigation::find($id)->update($request->all());

   return redirect()->route('irrigation.index')
                   ->with('warning','Riego Eliminado');
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{
   Irrigation::find($id)->delete();

   return redirect()->route('irrigation.index')
                   ->with('error','Riego elimiado');
}
}

}


