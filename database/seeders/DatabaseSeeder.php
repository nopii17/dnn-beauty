<?php

namespace Database\Seeders;

use App\Models\Arrival;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Collection::truncate();
        Arrival::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::create([
            'name' => 'Nurul Ariqah',
            'username' => 'nurularqh',
            'email' => 'nurul@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Novia Rahmadhani',
            'username' => 'noviarp',
            'email' => 'novia@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Diyang Raditya',
            'username' => 'diyangra',
            'email' => 'diyang@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);

        Collection::create([
            'name' => 'Face',
            'url' => 'assets/collection-face.png',
        ]);

        Collection::create([
            'name' => 'Hair',
            'url' => 'assets/collection-hair.png',
        ]);

        Collection::create([
            'name' => 'Body',
            'url' => 'assets/collection-body.png',
        ]);

        Arrival::create([
            'name' => 'OUAI SHAMPOO',
            'url' => 'assets/product-1.png',
            'price' => 273000
        ]);

        Arrival::create([
            'name' => 'OLAPLEX HAIR PERFECTOR',
            'url' => 'assets/product-2.png',
            'price' => 198000
        ]);

        Arrival::create([
            'name' => 'ALPHA HYALURONIC',
            'url' => 'assets/product-3.png',
            'price' => 214000
        ]);

        Arrival::create([
            'name' => 'NOCOTINA BODY WASH',
            'url' => 'assets/product-4.png',
            'price' => 280000
        ]);
    }
}
