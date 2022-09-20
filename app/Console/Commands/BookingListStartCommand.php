<?php

namespace App\Console\Commands;

use App\Models\BookingList;
use Illuminate\Console\Command;

class BookingListStartCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set Status Booking to Used based on time';

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
        $lists = BookingList::whereStatus('approved')
                            ->where('date', '=', now())
                            ->where('start', '>=', now())
                            ->where('end', '=<', now())
                            ->get();

        foreach ($lists as $list) {
            $list->update([
                'status' => 'used',
            ]);
        }

        $this->info('Set Status booking to used done.');

        return 0;
    }
}
