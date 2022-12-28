<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Product;
use App\Mail\SendEmail;
use Mail;

class StockScheduler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:lowstock_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Stock products, send notification to admin at 6 PM daily via email.';

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
        $product = Product::where('stock', '<=', '10')->get();

        $to_email = "testqueue123@yopmail.com";

        Mail::to($to_email)->send(new SendEmail($product));

        $this->info('Daily report has been sent successfully!');
        return 'Daily report has been sent successfully!';
        
    }
}
