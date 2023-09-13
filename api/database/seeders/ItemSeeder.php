<?php

namespace Database\Seeders;

use App\Models\Item;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('items')->truncate();
        DB::table('itemclosure')->truncate();
        $itemsSql = 'insert into items (id, parent_id, image_path, model, position, title,price) values(?, ?, ?, ?, ?, ?,?)';
         $itemClosureSql = 'insert into itemclosure (ancestor, descendant, depth) values(?, ?, ?)';
         $lists = [
            [
                'id' => '1',
                'title' => 'Water And Foodbowls'
            ],
            [
                'id' => '2',
                'title' => 'Bed'
            ],
            [
                'id' => '3',
                'title' => 'Treats and Toys',
            ],
            [
                'id' => '4',
                'title' => 'Grooming Brush'
            ],
            [
                'id' => '5',
                'title' => 'Food'
            ],
            [
                'id' => '6',
                'title' => 'Pet First Aid Kit'
            ],
            [
                'id' => '7',
                'title' => 'Toothbrush'
            ],
            [
                'id' => '8',
                'title' => 'Nail Trimmer'
            ],
        ]; 
        foreach ($lists as $key => $value) {
            $list = (object) $value;
            DB::insert($itemsSql, [$list->id, null, null, '101', 0, $list->title,null]);
            DB::insert($itemClosureSql, [$list->id, $list->id, 0]);
        };
        $waterBlowOne = new Item(array(
            'id' => 101,
            'title' => 'Water And Foodbowls',
        ));

        $waterBlow = Item::find(1);

        $waterBlowParent= $waterBlow->addChild($waterBlowOne, null, true);
        $waterFoodTabs = [
            new Item(array(
                'title' => 'plastic',
                'title_order' => 1,
            )),
        ];
        foreach ($waterFoodTabs as $key => $value) {
            ${'waterTemp' . $key} = $waterBlowParent->addChild($value, null, true);
        }
        $bedOne = new Item(array(
            'id' => 201,
            'title' => 'Water And Foodbowls',
        ));
        $bed = Item::find(2);

        $bedParent= $bed->addChild($bedOne, null, true);
        $waterFoodTabs = [
            new Item(array(
                'title' => 'plastic',
                'title_order' => 1,
            )),
        ];
        foreach ($waterFoodTabs as $key => $value) {
            ${'waterTemp' . $key} = $bedParent->addChild($value, null, true);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
