<?php

use Illuminate\Database\Seeder;

class ChecklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checklists')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content_id' => 0,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 1,
            'proposition_id' => 1,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 2,
            'proposition_id' => 1,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 1,
            'proposition_id' => 2,
            'content_id' => 3,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 9,
            'proposition_id' => 3,
            'content_id' => 0,
            'status' => 2,
        ]);
        
        DB::table('checklists')->insert([
            'user_id' => 1,
            'proposition_id' => 3,
            'content_id' => 1,
            'status' => 2,
        ]);
        
        
    }
}
