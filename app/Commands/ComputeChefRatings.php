<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use App\User;

class ComputeChefRatings extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

	protected $chefId;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($chefId)
	{
		$this->chefId = $chefId;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$chef = User::find($chefId);
		$chefRatingsSum = 0;
		$nReviews = $chef->clientReviews->count();

		foreach ($chef->clientReviews as $clientReview)
		{
			$chefRatingsSum = $chefRatingsSum + $clientReview->chef_rating;
		}

        $chef->rating = 5.0;
        $chef->save();
	}

}
