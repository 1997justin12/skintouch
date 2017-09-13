<?php

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
        DB::table('products')->insert([
        		[
        			'name' => 'Carrot Soap',
        			'price1' => '110',
        			'price2' => '75',
        			'price3' => '75'
        		],
        		[
        			'name' => 'C&C',
        			'price1' => '110',
        			'price2' => '75',
        			'price3' => '55'
        		],
        		[
        			'name' => 'Glutapink Soap',
        			'price1' => '120',
        			'price2' => '85',
        			'price3' => '65'
        		],
        		[
        			'name' => 'Peeling Soap',
        			'price1' => '100',
        			'price2' => '85',
        			'price3' => '65'
        		],
        		[
        			'name' => 'Ultra White Soap',
        			'price1' => '100',
        			'price2' => '85',
        			'price3' => '65'
        		],
        		[
        			'name' => 'Glutamilk Soap',
        			'price1' => '100',
        			'price2' => '85',
        			'price3' => '65'
        		],
        		[
        			'name' => 'Eraser Soap',
        			'price1' => '100',
        			'price2' => '80',
        			'price3' => '60'
        		],
        		[
        			'name' => 'Kojic Soap',
        			'price1' => '120',
        			'price2' => '85',
        			'price3' => '65'
        		],
        		[
        			'name' => 'Night Cream',
        			'price1' => '90',
        			'price2' => '65',
        			'price3' => '55'
        		],
        		[
        			'name' => 'Day Cream',
        			'price1' => '150',
        			'price2' => '120',
        			'price3' => '90'
        		],
        		[
        			'name' => 'Collagen Cream',
        			'price1' => '95',
        			'price2' => '65',
        			'price3' => '55'
        		],
        		[
        			'name' => 'Sunblock Cream',
        			'price1' => '95',
        			'price2' => '70',
        			'price3' => '60'
        		],
        	]);
    }
}
