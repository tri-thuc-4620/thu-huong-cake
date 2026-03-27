<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            // Products
            'products.view', 'products.create', 'products.edit', 'products.delete',
            // Categories
            'categories.view', 'categories.create', 'categories.edit', 'categories.delete',
            // Orders
            'orders.view', 'orders.create', 'orders.edit', 'orders.delete',
            'orders.confirm', 'orders.process', 'orders.ship', 'orders.complete', 'orders.cancel',
            // Blog
            'blog.view', 'blog.create', 'blog.edit', 'blog.delete',
            // Stores
            'stores.view', 'stores.create', 'stores.edit', 'stores.delete',
            // Sliders & Banners
            'sliders.view', 'sliders.create', 'sliders.edit', 'sliders.delete',
            'banners.view', 'banners.create', 'banners.edit', 'banners.delete',
            // Pages
            'pages.view', 'pages.create', 'pages.edit', 'pages.delete',
            // Contact
            'contacts.view', 'contacts.reply',
            // Settings
            'settings.view', 'settings.edit',
            // Users & Roles
            'users.view', 'users.create', 'users.edit', 'users.delete',
            'roles.view', 'roles.create', 'roles.edit', 'roles.delete',
            // Attributes & Price
            'attributes.view', 'attributes.create', 'attributes.edit', 'attributes.delete',
            'price-tables.view', 'price-tables.create', 'price-tables.edit', 'price-tables.delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $manager = Role::firstOrCreate(['name' => 'manager']);
        $manager->givePermissionTo([
            'products.view', 'products.create', 'products.edit',
            'categories.view', 'categories.create', 'categories.edit',
            'orders.view', 'orders.edit', 'orders.confirm', 'orders.process', 'orders.ship', 'orders.complete', 'orders.cancel',
            'blog.view', 'blog.create', 'blog.edit',
            'stores.view',
            'sliders.view', 'sliders.edit',
            'banners.view', 'banners.edit',
            'contacts.view', 'contacts.reply',
            'attributes.view', 'attributes.create', 'attributes.edit',
            'price-tables.view', 'price-tables.create', 'price-tables.edit',
        ]);

        $editor = Role::firstOrCreate(['name' => 'editor']);
        $editor->givePermissionTo([
            'products.view',
            'blog.view', 'blog.create', 'blog.edit',
            'sliders.view', 'sliders.create', 'sliders.edit',
            'banners.view', 'banners.create', 'banners.edit',
            'pages.view', 'pages.create', 'pages.edit',
        ]);

        $staff = Role::firstOrCreate(['name' => 'staff']);
        $staff->givePermissionTo([
            'products.view',
            'orders.view', 'orders.confirm', 'orders.process', 'orders.ship', 'orders.complete',
            'contacts.view', 'contacts.reply',
        ]);

        Role::firstOrCreate(['name' => 'customer']);

        // Create super admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@thuhuongcake.vn'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );
        $user->assignRole('super-admin');

        // Create test users
        $managerUser = User::firstOrCreate(
            ['email' => 'manager@thuhuongcake.vn'],
            [
                'name' => 'Quan ly',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );
        $managerUser->assignRole('manager');

        $staffUser = User::firstOrCreate(
            ['email' => 'staff@thuhuongcake.vn'],
            [
                'name' => 'Nhan vien',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );
        $staffUser->assignRole('staff');
    }
}
