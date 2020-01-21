<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //  brand
        Permission::create(['name' => 'view brand']);
        Permission::create(['name' => 'update brand']);
        Permission::create(['name' => 'new brand']);
        Permission::create(['name' => 'delete brand']);

        //  category
        Permission::create(['name' => 'view category']);
        Permission::create(['name' => 'update category']);
        Permission::create(['name' => 'new category']);
        Permission::create(['name' => 'delete category']);

        //  coupon
        Permission::create(['name' => 'view coupon']);
        Permission::create(['name' => 'update coupon']);
        Permission::create(['name' => 'new coupon']);
        Permission::create(['name' => 'delete coupon']);

        //  role
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'new role']);
        Permission::create(['name' => 'delete role']);

        //  product
        Permission::create(['name' => 'view product']);
        Permission::create(['name' => 'update product']);
        Permission::create(['name' => 'new product']);
        Permission::create(['name' => 'delete product']);

        //  slide
        Permission::create(['name' => 'view slide']);
        Permission::create(['name' => 'update slide']);
        Permission::create(['name' => 'new slide']);
        Permission::create(['name' => 'delete slide']);

        //  user
        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'new user']);
        Permission::create(['name' => 'delete user']);
        // order
        Permission::create(['name' => 'view order']);
        Permission::create(['name' => 'update order']);
        Permission::create(['name' => 'new order']);
        Permission::create(['name' => 'delete order']);

        Permission::create(['name' => 'not permission']);
        //role
        Role::create(['name' => 'ADMIN']);

        Role::create(['name' => 'AUTHOR']);

        Role::create(['name' => 'EMPLOYEE']);

        Role::create(['name' => 'CUSTOMER']);

        $admin=  Role::create(['name' => 'SUPPER ADMIN']);

        $permissions=Permission::where('name','<>','not permission')->get('id')->pluck('id');
        $admin->syncPermissions($permissions);

    }
}
