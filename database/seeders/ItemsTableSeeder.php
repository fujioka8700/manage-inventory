<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Faker\Provider\DateTime;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'ティッシュ',
            '食器用洗剤',
            '洗濯用洗剤',
            'ハンドソープ',
            'ボディーソープ',
            'ラップ',
            'アルミホイル',
            '歯ブラシ',
            '歯磨き粉',
            'トイレ掃除洗剤',
            'パイプ掃除洗剤',
            'ゴミ袋',
            '箱ティッシュ',
            '箱なしティッシュ',
            'シャンプー ',
            'リンス',
            'ボディーソープ',
            'クレンジング',
            'ハンドソープ詰替大',
            '歯磨き粉',
            '柔軟剤',
            '洗濯洗剤',
            'シミ取洗剤',
            'パイプ洗浄剤',
            'カビハイター',
            'トイレ消臭スプレー',
            'アルミホイル',
            'ジップロック袋',
            '弁当用おかずケース',
            'ゴミ袋45リットル',
            'レジ袋特大50✕70',
            'コピー用紙A4',
            '電球',
            'ハイター',
            '日焼け止め',
            '虫よけスプレー',
            '防虫剤',
            '消臭剤',
            'お風呂カビ取り',
            'スポンジ',
            'たわし',
            'クッキングペーパー',
            '漂白剤',
            'ナイロンタオル',
            '石鹸',
            '角質削り',
            '浴室掃除用スポンジ',
            '浴室用洗剤',
            '鏡磨き',
            '歯磨き',
            'カミソリ',
            'シェービングジェル',
            '綿棒',
            'ワセリン',
            '化粧水',
            '炭酸ソーダ',
            'トイレットペーパー',
            'トイレ用ウェットシート',
            'トイレ用洗剤',
            '靴磨き',
            '防水スプレー',
            '雑巾',
            'ドライシート',
            'ウェットシート',
            'コロコロ',
            'アルカリ電解水',
            '重曹',
            'クエン酸',
            'ノート',
            'マジックペン',
            'ボールペン',
            'マスキングテープ',
            'ウェットティッシュ',
            'ストレッチテープ',
            'ダクトテープ',
        ];

        shuffle($items);

        foreach($items as $item) {
            DB::table('items')->insert([
                'title' => $item,
                'quantity' => rand(0, 20),
                'created_at' => Carbon::parse('2000-01-01 00:00:00'),
                'updated_at' => DateTime::dateTimeThisDecade(),
            ]);
        }

        // サムネイル画像の登録
        $array = range(1, count($items));
        shuffle($array);

        for ($i=0; $i < count($items); $i++) {
            DB::table('items')->where('id', $i + 1)->update([
                'file_name'=> $array[$i] . '.png',
                'file_path'=>'public/uploads/' . $array[$i] . '.png'
            ]);
        }
    }
}
