<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipilaty extends Model
{
    public function districts()
    {
        return $this->HasMany(District::class);
    }
}
