<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserFeedback;
class MessageController extends Controller
{
    public function index(){
        $feedbacks=UserFeedback::where('has_read',0)->get();
    	return view('message.index',['feedbacks'=>$feedbacks]);
    }
}
