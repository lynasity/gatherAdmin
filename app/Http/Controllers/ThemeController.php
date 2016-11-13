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
        if(!Themes::where('theme_name',$theme_name)->first()){
              $theme=new Themes();
              $theme->theme_name=$theme_name;
              $theme->save();
        }else{
        	return 'this theme already exists';
        }
    }

    public function delete(request $request,$id){
          var_dump($_GET['id']);
          exit;
          $theme=Themes::find($id);
          if($theme){
          	$theme->delete();
          }else{
          	// return view('error');
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

    public function update(){

    }

    public function showAll(){
        // $themes=Themes::all();
         $themes=[];
        return view('theme.index',['themes'=>$themes]);
    }

    public function show(){

    }
}
