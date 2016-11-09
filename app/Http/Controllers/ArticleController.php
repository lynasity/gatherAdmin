<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OriginArticle;
use App\ThemeFeeds;
class ArticleController extends Controller
{
	// show all original articles
    public function showAll(){

         $articles=OriginArticle::paginate(5);
         return view('articles/all',['articles'=>$articles]);    
    }
    // show all articles haven't be done 
    public  function showAllUndone(){
    	$articles=OriginArticle::where('has_done',0)->paginate(5);
    	return view('articles/all',['articles'=>$articles]);   
    }
    // put original articles into db
     public function add(Request $request){
        $gzh_id=$request->input('gzh_id');
        $title=$request->input('title');
        $digest=$request->input('digest');
        $content=$request->input('content');
        $url=$request->input('url');
        $date=$request->input('date');
  
        $OriginArticle=new OriginArticle();
        $OriginArticle->name=$name;
        $OriginArticle->historyUrl=$historyUrl;
        	if($OriginArticle->save()){
                 return 'ok';
        	}else{
                 return 'error';
        	}
    }
    // when you click the item in the list, you will see their detail
    public function showDetail($id){
        $originArticle=OriginArticle::find($id);
        return view('articles.detail',['originArticle'=>$originArticle]);
    }
     // classify the original message and push into feeds
    public function classify(request $request){

          $newFeed =new ThemeFeeds();
          $articleId=$request->input('articleId');
          $newFeed->organization=$request->input('organization');
          $newFeed->title=$request->input('title');
          $newFeed->url=$request->input('url');
          $newFeed->description=$request->input('content');
          $newFeed->date=$request->input('date');
          $newFeed->theme_id=$request->input('theme_id');
          if($newFeed->save()){
          	// mark as done
          	 $originArticle=OriginArticle::find($articleId)->update(['has_done'=>1]);
          	 return 'ok';
          }else{
          	return 'fail';
          }      
    }
}
