<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gzh;
class GzhController extends Controller
{
    public function showAll(){
           $gzhs=Gzh::paginate(5);
           return view('gzh.all',['gzhs'=>$gzhs]);
    }

    public function addGzh(){
          return view('gzh.add');
    }

    public function add(Request $request){

        $name=$request->input('name');
        $id=$request->input('id');
        $type='update';
        // $historyUrl=$request->input('historyUrl');
        if(is_null($id)){
          $gzh=Gzh::where('name',$name)->first();

      }else{
          $gzh=Gzh::where('id',$id)->first();
      }
        if(!$gzh){
            $gzh=new Gzh();
            $type='create';
        }
        $gzh->name=$name;
        if($gzh->save()){
            return response()->json(['code'=>200,'status'=>"ok",'type'=>$type,'data'=>$gzh]);
          }else{
             return response()->json(['code'=>500,'status'=>'Internel Server Error']);
          }
    }

    public function updateGzh($id){
          return view('gzh.update');
    }

    public function update(request $request){

 	  $name=$request->input('name');
      $historyUrl=$request->input('historyUrl');
        // filter
      $gzh=Gzh::find($id)->update(['name'=>$name,'historyUrl'=>$historyUrl]);
    }

    public function delete($id){
        // $id=$request->input('id');
         $gzh=Gzh::find($id);
         if($gzh->delete()){
             return response()->json(['code'=>200,'status'=>'ok']);
         }else{
             return response()->json(['code'=>500,'status'=>'ff']);
         }
    }
}
