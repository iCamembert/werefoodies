<?php namespace App\Http\Controllers;

use App\Dish;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::all();

        $dishes = Dish::orderBy('rating', 'desc')->limit(12)->get();

        $todayDishes = Dish::orderBy('rating', 'desc')->limit(3)->get();

        $chefsOfTheWeek = User::orderBy('rating', 'desc')->limit(3)->get();

		return view('home', compact('users', 'dishes', 'todayDishes', 'chefsOfTheWeek'));
	}

	public function changeLanguage($language)
	{
		App::setLocale($language);

		$users = User::all();

        $dishes = Dish::orderBy('rating', 'desc')->limit(12)->get();

        $todayDishes = Dish::orderBy('rating', 'desc')->limit(3)->get();

        $chefsOfTheWeek = User::orderBy('rating', 'desc')->limit(3)->get();

		return view('home', compact('users', 'dishes', 'todayDishes', 'chefsOfTheWeek'));
	}

}
