<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * itemsテーブルと関連付け(多対多)
     */
    public function items()
    {
        return $this->belongsToMany('App\Models\Item')->withTimestamps();
    }
}
