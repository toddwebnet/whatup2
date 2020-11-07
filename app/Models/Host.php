<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $fillable = ['hostname', 'last_ping', 'status'];

    public function toArray()
    {
        return [
                'datetime' => date("Y-m-d H:i a", $this->last_ping)
            ] +
            parent::toArray();
    }
}
