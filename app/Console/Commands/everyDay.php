<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;
use Carbon\Carbon;
class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will run every day to update the ads Thankx';

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
        $payments = Payment::where('active',1)->get();
        if(!empty($payments))
        {
            foreach($payments as $payment)
            {
               $duration = isset($payment->duration) ? ($payment->duration * 7) : 7;

               $todayDate = date('Y-m-d');
               $updateDate = date('Y-m-d',strtotime($payment->updated_at));
                
               $diff = abs(strtotime($todayDate) - strtotime($updateDate));

                $years = floor($diff / (365*60*60*24));
                $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

              if($days > $duration)
              {
                  Payment::where('id',$payment->id)->update(['active' => 0, 'updated_at' => NULL]);
              }

            }
        }
        echo "Operation Done";
//        return 0;
    }
}
