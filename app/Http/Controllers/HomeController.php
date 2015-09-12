<?php namespace App\Http\Controllers;

use App;
use App\Dish;
use App\User;
use Illuminate\Support\Facades\Auth;
use Torann\GeoIP\GeoIPFacade;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use DB;

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
        $dishesForMap = Dish::join('users', 'dishes.user_id', '=', 'users.id')->orderBy('dishes.rating', 'desc')->groupBy('dishes.user_id')->select('dishes.*', 'users.address_google_place_id')->get();

        $dishes = Dish::orderBy('rating', 'desc')->limit(12)->get();

        $todayDishes = Dish::orderBy('rating', 'desc')->limit(3)->get();

        $chefsOfTheWeek = User::orderBy('rating', 'desc')->limit(3)->get();

        $location = GeoIPFacade::getLocation();

		return view('home', compact('dishesForMap', 'dishes', 'todayDishes', 'chefsOfTheWeek', 'location'));
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

	public function search($googlePlaceId)
	{
        $dishesForMap = Dish::select(DB::raw('dishes.name, max(dishes.rating) as maxRating, users.address_google_place_id'))->join('users', 'dishes.user_id', '=', 'users.id')->where('users.city_google_place_id', '=', $googlePlaceId)->orderBy('maxRating', 'desc')->groupBy('dishes.user_id')->get();
		
		return view('search', compact('dishesForMap'));
	}

}
