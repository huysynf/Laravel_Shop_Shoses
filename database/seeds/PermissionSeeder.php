<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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
        $manageUser = Role::create(['name' => 'MANAGE USER']);

        $manageProduct = Role::create(['name' => 'MANAGE PRODUCT']);

        $manageCategory = Role::create(['name' => 'MANAGE CATEGORY']);

        $manageBrand = Role::create(['name' => 'MANAGE BRAND']);

        $manageOrder = Role::create(['name' => 'MANAGE ORDER']);

        $manageRole = Role::create(['name' => 'MANAGE ROLE']);

        $manageSlide = Role::create(['name' => 'MANAGE SLIDE']);

        $manageCoupon = Role::create(['name' => 'MANAGE COUPON']);

        $customer = Role::create(['name' => 'CUSTOMER']);


        $permissionUsers = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'user' . '%')->get('id')->pluck('id');
        $manageUser->syncPermissions($permissionUsers);

        $permissionProducts = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'product' . '%')->get('id')->pluck('id');
        $manageProduct->syncPermissions($permissionProducts);

        $permissionCategories = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'category' . '%')->get('id')->pluck('id');
        $manageCategory->syncPermissions($permissionCategories);

        $permissionBrand = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'brand' . '%')->get('id')->pluck('id');
        $manageBrand->syncPermissions($permissionBrand);

        $permissionOrder = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'order' . '%')->get('id')->pluck('id');
        $manageOrder->syncPermissions($permissionOrder);

        $permissionRole = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'role' . '%')->get('id')->pluck('id');
        $manageRole->syncPermissions($permissionRole);

        $permissionSlide = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'slide' . '%')->get('id')->pluck('id');
        $manageSlide->syncPermissions($permissionSlide);

        $permissionCoupon = Permission::where('name', '<>', 'not permission')->Where('name', 'LIKE',
            '%' . 'coupon' . '%')->get('id')->pluck('id');
        $manageCoupon->syncPermissions($permissionCoupon);

        $permissionCustomer = Permission::where('name', 'not permission')->Where('name', 'LIKE',
            '%' . 'order' . '%')->get('id')->pluck('id');
        $customer->syncPermissions($permissionCustomer);

        $user = \App\Models\User::find(1);
        $user->syncRoles([
            'MANAGE USER',
            'MANAGE PRODUCT',
            'MANAGE CATEGORY',
            'MANAGE BRAND',
            'MANAGE ORDER',
            'MANAGE ROLE',
            'MANAGE SLIDE',
            'MANAGE COUPON'
        ]);
    }
}
