<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'José Carlos',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123Mudar'),
            'email_verified_at' => now(),
        ]);

        $role = Role::create(['name' => 'Admin']);
        $user->assignRole($role);

        User::factory(19)->create();
    }
}
