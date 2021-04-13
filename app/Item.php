<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    protected $fillable = [
        'name',
        'price',
        'src',
    ];

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }
 
    public function isLikedBy(?User $user): bool
    {
        return $user
         ? (bool)$this->likes->where('id', $user->id)->count()
         : false;
    }
}
