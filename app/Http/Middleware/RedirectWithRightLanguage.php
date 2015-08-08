<?php namespace App\Http\Middleware;

use Closure;
use Torann\GeoIP\GeoIPFacade;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RedirectWithRightLanguage {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$location = GeoIPFacade::getLocation();

        if ($location['isoCode'] == 'FR')
        {

        	LaravelLocalization::setLocale('fr');

        } else if ($location['isoCode'] == 'KR')
        {

        	LaravelLocalization::setLocale('kr');

        } else
        {

        	LaravelLocalization::setLocale('en');

        }

		return $next($request);
	}

}
