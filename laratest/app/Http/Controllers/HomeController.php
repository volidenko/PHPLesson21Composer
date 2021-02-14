<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Registration()
    {
        return view('home.registration');
    }
    public function ShowUser()
    {
        if (!isset($_POST['regbtn'])) {
            return view('home.registration');
        }
        if ($_POST['age'] < 18) {
            return view('home.registration', array('error' => "Доступ к контенту запрещен!"));
        }
        if ($_POST['passw1'] !== $_POST['passw2']) {
            return view('home.registration', array('error' => "Пароли не совпадают"));
        }
        return view('home.userinfo', array('login' => $_POST['login'], 'age' => $_POST['age'], 'email' => $_POST['email']));
    }
}
