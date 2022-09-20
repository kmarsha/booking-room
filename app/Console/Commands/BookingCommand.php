<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

class BookingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run All Booking command';

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
        $this->call(BookingListStartCommand::class);
        $this->call(BookingListFinishCommand::class);
        $this->call(BookingListExpiredCommand::class);

        $this->info('All command has done called.');
        Log::info('All command has done called.');

        return 0;
    }
}
