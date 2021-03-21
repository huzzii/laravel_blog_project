<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = "HELLO AND WELCOME!!";
        return view('pages.index', compact('title'));
        // return 'HELLO';
    }

    public function about() {
        $title = "This is the about section and here we would like to let you know about us!!";
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $data = array(
            'title' => 'Services We Provide!!',
            'description' => 'These are the services we provide!!',
            'list' => ['Website Development', 'Software Development', 'Support', 'Application Development']
        );
        return view('pages.services')->with($data);
    }

    public function login() {
        return view('pages.login');
    }

    public function company() {
        return view('pages.company');
    }
}
