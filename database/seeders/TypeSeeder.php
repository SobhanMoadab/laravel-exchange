<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Types::insert(
            [
                ['name' => 'admin'],
                ['name' => 'user'],
            ]
        );
    }
}
