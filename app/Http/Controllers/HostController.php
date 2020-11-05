<?php

namespace App\Http\Controllers;

use App\Models\Host;
use Carbon\Carbon;

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
        $t = time();
        $d1 = new Carbon(1604608853);
        $d2 = new Carbon($t);

        $diff = $d1->diff($d2);
        $d = $t-1604608853;
        $minutes = $d/60;


    }
}
