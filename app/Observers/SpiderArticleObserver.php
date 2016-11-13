<?php
namespace App\Observers;
use App\Spider_article;
use App\User;
use App\Notifications\newArticle;
class SpiderArticleObserver{

// when spider insert new article into db
	public function created(Spider_article $Spider_article)
    {

    	$gzh_name=$Spider_article->gzh_name;
        $title=$Spider_article->title;
        // sent notification to admin to classify the artilce.
         $admins=User::all();
        Notification::send($admins, new newArticle($gzh_name,$title));
    }
    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(Spider_article $Spider_article)
    {
        //
    }
}