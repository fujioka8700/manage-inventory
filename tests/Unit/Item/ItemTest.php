<?php

namespace Tests\Feature\Item;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() : void
    {
        parent::setUp();

        $this->seed('ItemsTableSeeder');
    }

    /**
     * 在庫一覧画面、データ更新日 フォーマットのテスト 20XX/XX/XX
     *
     * @return void
     */
    public function test_Updated()
    {
        $date = Item::find(1)->getFormattedUpdatedAtAttribute();
        $this->assertNotFalse(strptime($date, '%Y/%m/%d'));
    }

    /**
     * 詳細画面の、データ更新日 フォーマットのテスト 20XX/XX/XX XX:XX:XX
     *
     * @return void
     */
    public function test_show_item_updated()
    {
        $date = Item::find(1)->getFormattedShowItemUpdatedAtAttribute();
        $this->assertNotFalse(strptime($date, '%Y/%m/%d %H:%M:%S'));
    }

    /**
     * 詳細画面の、データ作成日 フォーマットのテスト 20XX/XX/XX XX:XX:XX
     *
     * @return void
     */
    public function test_show_item_created()
    {
        $date = Item::find(1)->getFormattedShowItemCreatedAtAttribute();
        $this->assertNotFalse(strptime($date, '%Y/%m/%d %H:%M:%S'));
    }
}
