<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class task extends Model
{
    //



    /**
     * Get the user that owns the task.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
