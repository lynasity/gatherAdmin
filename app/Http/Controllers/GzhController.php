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
        $historyUrl=$request->input('historyUrl');
        if(!Gzh::where('name',$name)->first()){
        	$gzh=new Gzh();
        	$gzh->name=$name;
        	$gzh->historyUrl=$historyUrl;
        	if($gzh->save()){
                 return 'ok';
        	}else{
                 return 'error';
        	}
        }else{
        	return 'gzh has already exists';
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
         $gzh=Gzh::find($id);
         $gzh->delete();
    }

}
