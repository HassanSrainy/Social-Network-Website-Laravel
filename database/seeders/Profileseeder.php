<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;


class Profileseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Profile::factory(200)->create();
}
}
