<?php

namespace Database\Seeders;

use App\Models\Topicality;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopicalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Topicality::factory(30)->create();
    }
    
}
