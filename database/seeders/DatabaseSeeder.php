<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criar permissões
        $permissions = [
            'gestao de produtos',
            'gestao de categorias',
            'gestao de marcas',
            'gerenciar usuários'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Criar papéis (roles)
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'comum']);

        // ✅ O administrador só pode gerenciar usuários
        $adminRole->givePermissionTo('gerenciar usuários');

        // ✅ O usuário comum pode acessar gestão de produtos, categorias e marcas
        $userRole->givePermissionTo(['gestao de produtos', 'gestao de categorias', 'gestao de marcas']);

        // Criar um usuário administrador e atribuir o papel
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole($adminRole);

        // Criar um usuário comum
        $user = User::create([
            'name' => 'Usuário Comum',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($userRole);
    }
}
