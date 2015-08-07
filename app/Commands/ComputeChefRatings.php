<?php namespace App\Commands;

use App\User;
use App\Commands\Command;

use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ComputeChefRatings extends Command implements SelfHandling, ShouldBeQueued {

	use InteractsWithQueue, SerializesModels;

	public $chef;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(User $chef)
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
		$orders = $this->chef->orders;
		
	}

}
