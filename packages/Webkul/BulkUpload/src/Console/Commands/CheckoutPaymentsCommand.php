<?php
 
namespace Webkul\BulkUpload\Console\Commands;
 
use Illuminate\Console\Command;
 
class CheckoutPaymentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:payments';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find all payments in checkout page';
 
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
    }
}