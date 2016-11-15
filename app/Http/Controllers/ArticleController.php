<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThemeFeeds;
use App\Spider_article;
class ArticleController extends Controller
{
	// show all original articles
    public function showAll(){
         $undoneArticles=Spider_article::paginate(10);
         $articles=Spider_article::where('has_done',1)->paginate(3);
         return view('articles/all',['articles'=>$articles,'undoneArticles'=>$undoneArticles]);
    }
    // show all articles haven't be done
    public  function showAllUndone(){
    	$articles=Spider_article::where('has_done',0)->paginate(5);
    	return view('articles/all',['articles'=>$articles]);
    }

    // when you click the item in the list, you will see their detail
    public function showDetail($id){
        $originArticle=Spider_article::find($id);
        return
        view('articles.detail',['originArticle'=>$originArticle]);
    }
     // classify the original message and push into feeds
    public function classify(request $request){

          $newFeed =new ThemeFeeds();
          $articleId=$request->input('articleId');
          $newFeed->organization=$request->input('organization');
          $newFeed->title=$request->input('title');
        //   $newFeed->url=$request->input('url');
          $newFeed->description=$request->input('description');
          $newFeed->date=$request->input('date');
          $newFeed->theme_id=$request->input('theme_id');
          if($newFeed->save()){
          	// mark as done
          	 $originArticle=Spider_article::where('id',$articleId)->update(['has_done'=>1]);
          	 return response()->json(['code'=>200,'status'=>'ok']);
          }else{
          	return response()->json(['code'=>500,'status'=>"Internal Server Error"]);
          }
    }
}
