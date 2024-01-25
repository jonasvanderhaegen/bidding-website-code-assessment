<?php

namespace App\Console\Commands;

use App\Models\Lot;
use App\Models\User;
use App\Notifications\SendNotificationToWinnerOfLot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class CheckLotExpiredEndDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check-lots-expired-end-datetime';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        foreach(Lot::where('status', '=', true)->where('processed_after_expiration', '=', false)
                    ->where('datetime_end', '<', \Carbon\Carbon::now())->get() as $lot) {

            if ($lot->bids->count()) {

                $bid = $lot->bids()->latest()->first();

                if ($user = User::where('email', '=', $bid->email)->first()) {
                    //ray($bid, $user);
                    $lot->update(['user_id' => $user->id]);
                    $bid->update(['user_id' => $user->id]);
                }

                Notification::route('mail', $bid->email)
                    ->notify(new SendNotificationToWinnerOfLot($lot, $bid));

            }

            $lot->update(['processed_after_expiration'=> true]);
        }
    }
}
