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
		$url = $request->url();

        if ($location['isoCode'] == 'FR')
        {

        	if ($url != LaravelLocalization::getLocalizedURL('fr'))
        		return redirect(LaravelLocalization::getLocalizedURL('fr'));

        } else if ($location['isoCode'] == 'KR')
        {

        	if ($url != LaravelLocalization::getLocalizedURL('kr'))
        		return redirect(LaravelLocalization::getLocalizedURL('kr'));

        } else
        {

        	if ($url != LaravelLocalization::getLocalizedURL('en'))
        		return redirect(LaravelLocalization::getLocalizedURL('en'));

        }

		return $next($request);
	}

}
