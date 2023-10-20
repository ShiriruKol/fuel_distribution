<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Fuel;
use App\Models\Role;
use App\Models\TypeFuel;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Fuel::factory(10)->create();
        Role::factory()->state([
                'name' => 'Админ',
            ]
        )->create();
        Role::factory()->state([
                'name' => 'Сотрудник',
            ]
        )->create();
        User::factory(5)->create();
        TypeFuel::factory(15)->create();
    }
}
