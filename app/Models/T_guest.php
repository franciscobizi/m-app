<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class T_guest extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\T_guest','guestid');
    }
}