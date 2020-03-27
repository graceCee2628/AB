<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$title = 'Welcome To HelpDesk';
    	return view ('pages.index', compact('title'));
    }
    public function about(){
    	$title = 'About Us';
    	return view ('pages.about')->with('title', $title);//this is another way of passing a variable to a page
    }  
    public function services(){
    	$data = array(
    		'title' => 'Services', //associative array (comes with pair)
    		'services' => ['Technical Support', 'Chat Support', 'Email Support']
    	);
    return view ('pages.services') ->with($data);//this is another way of passing a variable to a page
       
    }   

}
