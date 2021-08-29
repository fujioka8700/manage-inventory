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
     * 整形した更新日(在庫一覧ページ)
     * メソッド名が、bladeで引数になるので、まとめることは不可。
     * @return string
     */
    public function getFormattedUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y/m/d');
    }

    /**
     * 整形した更新日(在庫データ詳細ページ)
     * メソッド名が、bladeで引数になるので、まとめることは不可。
     * @return string
     */
    public function getFormattedShowItemUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['updated_at'])->format('Y/m/d H:i:s');
    }

    /**
     * 整形した作成日(在庫データ詳細ページ)
     * メソッド名が、bladeで引数になるので、まとめることは不可。
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

    /**
     * @param Illuminate\Database\Eloquent\Model $items_query
     * @param array $index_request
     */
    public function inventorySearch($items_query, $index_request)
    {
        if(!empty($index_request['keyword'])) {
            $search_keyword = $index_request['keyword'];

            // 物品名で検索された場合
            if ($index_request['column'] == 'title') {
                $items_query->where('title', 'LIKE', "%{$search_keyword}%");
                \Debugbar::info($items_query->get());
            }

            // カテゴリか、保管場所で検索された場合
            if ($index_request['column'] != 'title') {
                $items_query->whereHas($index_request['column'], function($items_query) use ($search_keyword) {
                    $items_query->where('name', 'LIKE', "%{$search_keyword}%");
                });
                \Debugbar::info($items_query->get());
            }
        }
    }
}
