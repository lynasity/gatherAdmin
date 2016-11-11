<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spider_gzh;
use App\Spider_article;
class SpiderController extends Controller
{
    // public function storeGzhInfo(Request $request){
    // 	$name=$request->input('name');
    // 	$gzh=Spider_gzh::where('name',$name)->first();
    // 	if(!$gzh){
    // 		$newGzh=Spider_gzh::create(['name'=>$name,'historyUrl'=>$request->input('historyUrl')]);
    // 		if($newGzh){
    //             return response()->json(['code'=>'200','status'=>'ok','data'=>$gzh->id]);
    // 		}else{
    //           return response()->json(['code'=>'500','status'=>'Internal Server Error']);
    // 		}
    // 	}
    //       return response()->json(['code'=>'200','status'=>'ok','data'=>$gzh->id]);
    // }

    // public function getGzhUrlById(request $request){
    //          $id=$request->input('id');
    //          $gzh=Spider_gzh::find($id);
    //          if($gzh){
    //             return response()->json(['code'=>200,'status'=>'ok','data'=>$gzh->historyUrl]);
    //          }else{
    //             return response()->json(['code'=>404,'status'=>'not found']);
    //          }
    // }
      
     public function storeArticle(request $request){
        $request->input
        $article=new Spider_article::create(['gzh_id'=>$request->input('gzh_id'),'title'=>$request->input('title'),'contentUrl'=>$request->input('contentUrl'),'time'=>$request->input('time'),'gzh_name'=>$request->input('gzh_name')]);
        	if($OriginArticle){
                  return response()->json(['code'=>200,'status'=>'ok']);
        	}else{
                 return response()->json(['code'=>'500','status'=>'Internal Server Error']);
        	}         
    }
}
