<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ExhibitsTableSeeder::class);
        $this->call(PropositionsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
        $this->call(ChecklistsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ExhibitTaggingTableSeeder::class);
    }
}
