<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
        	'name' => 'Aksi',
            'director' => 'test',
            'genre' => 'test',
            'year' => '2022',
            'synopsis' => 'ala ala',
            'price' => 50000,
            'main_image' => 'https://picsum.photos/200/300',
            '_image1' => '',
            '_image2' => '',
            '_image3' => '',
            'quantity' => 100,
            'category_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
