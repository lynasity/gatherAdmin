<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Themes;
// use Illuminate\Support\Facades\DB;
class ThemeController extends Controller
{

    // public function __construct(){
    // 	// $this->middleware('cors');
    // }
    public function addTheme(Request $request){
        return view('theme.add');
    }

    public function add(Request $request){
        $theme_name=$request->input('theme_name');
        $id=$request->input('id');
        $type='update';
        if(is_null($id)){
          $theme=Themes::where('theme_name',$theme_name)->first();
      }else{
          $theme=Themes::where('id',$id)->first();
      }
        if(!$theme){
              $theme=new Themes();
              $type='create';
        }
        $theme->theme_name=$theme_name;
        if($theme->save()){
            return response()->json(['code'=>200,'status'=>"ok",'type'=>$type,'data'=>$theme]);
        }else{
            return response()->json(['code'=>500,'status'=>'Internel Server Error']);
        }
    }


    public function delete($id){
          $theme=Themes::find($id);
          if($theme->delete()){
            return response()->json(['code'=>200,'status'=>"ok"]);
          }else{
             return response()->json(['code'=>500,'status'=>'Internel Server Error']);
          }
    }

    public function updateTheme($id){

    	$theme=Themes::find($id);
          if($theme){
          	return view('theme.update',$theme);
          }else{
          	// return view('error');
          }

    }

    public function update(request $request,$id){


    }

    public function showAll(){
        $themes=Themes::paginate(5);
        return view('theme.index',['themes'=>$themes]);
    }

    public function show(){

    }
}
