<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'id' => 1,
                'user_id' => 1,
                'import_id' => 1,
                'lm' => '0001',
                'name' => 'Product 001',
                'category' => 'Category',
                'free_shipping' => true,
                'description' => 'Test Product 0001',
                'price' => 0.01
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'import_id' => 2,
                'lm' => '0002',
                'name' => 'Product 002',
                'category' => 'Category',
                'free_shipping' => true,
                'description' => 'Test Product 0002',
                'price' => 0.02
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'import_id' => 1,
                'lm' => '0003',
                'name' => 'Product 003',
                'category' => 'Category',
                'free_shipping' => false,
                'description' => 'Test Product 0003',
                'price' => 0.03
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'lm' => '0004',
                'name' => 'Product 004',
                'free_shipping' => false,
                'description' => 'Test Product 0004',
                'price' => 0.04
            ]
        );

        foreach ($data as $it) {
            Product::create($it);
        }
    }
}
