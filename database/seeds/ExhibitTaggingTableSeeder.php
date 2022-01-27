<?php

use Illuminate\Database\Seeder;

class ExhibitTaggingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 1,
            'tag_id' => 1,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 2,
            'tag_id' => 2,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 3,
            'tag_id' => 3,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 4,
            'tag_id' => 4,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 5,
            'tag_id' => 5,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 6,
            'tag_id' => 3,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 7,
            'tag_id' => 5,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 8,
            'tag_id' => 3,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 9,
            'tag_id' => 4,
        ]);
        
        DB::table('exhibit_tagging')->insert([
            'exhibit_id' => 10,
            'tag_id' => 3,
        ]);
    }
}
