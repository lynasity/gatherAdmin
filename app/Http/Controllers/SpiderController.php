<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spider_gzh;
use App\Spider_article;
use  App\Notifications\newArticle;
// use App\Gzh;
use Illuminate\Support\Facades\DB;
use App\User;

class SpiderController extends Controller
{  
     public function storeArticle(request $request){
         $name=$request->input('gzh.name');
         $articles=$request->input('gzh.articles');
         foreach ($articles as $article) {
            $record=Spider_article::where('title',$article['title'])->first();
            if($record){
               $record->contentUrl=$article['contentUrl'];
               $record->save();
            }else{
               $newArticle=Spider_article::create(['gzh_name'=>$name,'title'=>$article['title'],'contentUrl'=>$article['contentUrl'],'time'=>$article['time']]);
            }
         } 
     }      
// return all gzh need to be scrapied by spider
    public function getAllGzh(){
          $gzhsName=DB::table('gzh')->select('name')->get(); 
          return response()->json(['data'=>$gzhsName]);
    }
}
