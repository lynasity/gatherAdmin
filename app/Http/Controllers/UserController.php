<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GatherUser;
class UserController extends Controller
{
    public function showAll(){
           $gatherUsers=GatherUser::all();
           return view('gatherUser.all',['gatherUsers'=>$gatherUsers]);
    }
}
