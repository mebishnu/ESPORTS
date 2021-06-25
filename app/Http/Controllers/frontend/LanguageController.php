<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
 
    public function Nepali(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','nepali');
        return redirect()->back();
    }
 
  public function English(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }

}
