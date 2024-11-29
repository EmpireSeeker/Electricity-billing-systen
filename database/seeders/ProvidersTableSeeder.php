<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;


class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        {
            Provider::create(['name' => 'Provider One', 'logo_url' => 'https://via.placeholder.com/150', 'description' => 'Description Provider One']);
            Provider::create(['name' => 'Provider Two', 'logo_url' => 'https://via.placeholder.com/150', 'description' => 'Description Provider Two']);
            Provider::create(['name' => 'Provider Three', 'logo_url' => 'https://via.placeholder.com/150', 'description' => 'Description Provider Three']);
        }
    }
}
