<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $fillable = ['hostname', 'last_ping', 'status'];
}
