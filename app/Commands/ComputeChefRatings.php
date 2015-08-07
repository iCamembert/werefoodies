<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ComputeChefRatings extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

	protected $chef;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($chef)
	{
		$this->chef = $chef;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$chefRatingsSum = 0;
		/*$nReviews = $chef->clientReviews->count();

		foreach ($chef->clientReviews as $clientReview)
		{
			$chefRatingsSum = $chefRatingsSum + $clientReview->chef_rating;
		}

        $chef->rating = 5.0;
        $chef->save();*/
	}

}
