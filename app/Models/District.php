<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function municipilaty()
    {
        return $this->belongsTo(Municipilaty::class);
    }
}
