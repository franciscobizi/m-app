<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\T_guest;

class T_adresse extends Model
{
    public function adress()
    {
        return $this->belongsTo(T_guest::class,'guestid');
    }
}