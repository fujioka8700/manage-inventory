<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Item extends Model
{
    use HasFactory;

    /**
     * 整形した更新日
     * @return string
     */
    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y/m/d');
    }
}
