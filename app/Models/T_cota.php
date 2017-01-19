<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\T_guest;

class T_cota extends Model
{
    public function cota()
    {
        return $this->belongsTo(T_guest::class,'guestid');
    }
}