<?php

namespace App\Console\Commands;

use App\Models\BookingList;
use Carbon\Carbon;
use Illuminate\Console\Command;

class BookingListExpiredCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Status Booking to expired based on time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $lists = BookingList::whereStatus('pending')
                            ->where('date', '<', now())
                            ->where('start', '<', now())
                            ->where('end', '<', now())
                            ->get();

        foreach ($lists as $list) {
            $list->update([
                'status' => 'expired',
            ]);
        }

        $this->info('Set Status booking to expired done.');

        return 0;
    }
}
