<?php

namespace Database\Seeders;

use App\Enums\PanelTypeEnum;
use App\Models\User;
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
            'panel' => PanelTypeEnum::ADMIN,
        ]);

        Permission::create(['name' => 'view_any_user']);
        Permission::create(['name' => 'view_user']);
        Permission::create(['name' => 'create_user']);
        Permission::create(['name' => 'update_user']);
        Permission::create(['name' => 'delete_user']);
        Permission::create(['name' => 'restore_user']);
        Permission::create(['name' => 'force_delete_user']);

        $role = Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Gerente']);
        Role::create(['name' => 'Financeiro']);
        Role::create(['name' => 'Suporte']);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        $user->assignRole($role);

        User::factory(9)->create();
    }
}
