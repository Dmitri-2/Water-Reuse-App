<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function mainPage(){

        $states = State::all();
        //$counties = County::all();
        
        return view("search.searchpage", compact('states'));
    }

}
