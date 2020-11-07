<?php

namespace App\Console\Commands;

use App\Models\Host;
use App\Services\SendSmsService;
use Illuminate\Console\Command;

class CheckOutages extends Command
{

    protected $signature = 'check:outages';

    public function handle()
    {
        $this->line('checking');
        $time = time();
        foreach (Host::where('status', 'up')->get() as $host) {
            $minutes = round(($time - $host->last_ping) / 60, 0);
            if ($minutes > 15) {
                $lastDateString = date("Y-m-d h:i a", $host->last_ping);
                $hostName = $host->hostname;
                $message = "Host: {$hostName} is down\nLast known: " . $lastDateString . "\n{$minutes} minutes ago";
                $service = new SendSmsService();
                $service->sendMessage(env('NOTIFICATION_CELL'), $message);
                $this->line($message);
                $host->status = 'down';
                $host->save();
            }
        }
    }

}
