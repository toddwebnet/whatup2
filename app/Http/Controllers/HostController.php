<?php

namespace App\Http\Controllers;

use App\Models\Host;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;

class HostController
{

    public function ping($hostname)
    {

        $host = Host::where('hostname', $hostname)->first();
        $lastPing = time();
        $status = 'up';
        if ($host === null) {
            $host = Host::create([
                'hostname' => $hostname,
                'last_ping' => $lastPing,
                'status' => $status
            ]);
        } else {
            $host->update([
                'last_ping' => $lastPing,
                'status' => $status
            ]);
        }
        return $host;
    }

    public function pong()
    {
        return Artisan::call('check:outages');
    }

    public function check()
    {
        print_r(
            Host::orderby('timestamp')->get()->toArray()
        );
    }
}
