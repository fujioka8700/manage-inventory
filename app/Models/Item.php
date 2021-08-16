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
     * 整形した更新日(在庫一覧)
     * @return string
     */
    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y/m/d');
    }

    /**
     * 整形した更新日(在庫データ詳細)
     * @return string
     */
    public function getFormattedShowItemUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y/m/d H:i:s');
    }

    /**
     * 整形した作成日(在庫データ詳細)
     * @return string
     */
    public function getFormattedShowItemCreatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['created_at'])->format('Y/m/d H:i:s');
    }

    /**
     * categoriesテーブルと関連付け(多対多)、カテゴリを昇順に並び替え
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category')->withTimestamps()->withPivot('category_id')->orderBy('category_id', 'asc');
    }

    /**
     * placesテーブルと関連付け(多対多)
     */
    public function places()
    {
        return $this->belongsToMany('App\Models\Place')->withTimestamps();
    }
}
