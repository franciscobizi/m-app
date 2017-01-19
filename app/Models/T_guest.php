<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\T_adresse;

class T_guest extends Model
{
    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->hasMany(T_adresse::class,'id');
    }
}