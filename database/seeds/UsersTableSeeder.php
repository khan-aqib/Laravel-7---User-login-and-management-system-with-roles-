<?php

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\Hash;
use App\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        DB::table('role_user')->truncate();

        $superadminRole = Role::where('name','super-admin')->first();
        $adminRole = Role::where('name','admin')->first();
        $purchaseRole = Role::where('name','purchase')->first();
        $accountsRole = Role::where('name','accounts')->first();
        $userRole = Role::where('name','user')->first();

        $superadmin = User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('password')

        ]);

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')

        ]);
        $purchase = User::create([
            'name' => 'Purchase User',
            'email' => 'purchase@purchase.com',
            'password' => Hash::make('password')

        ]);
        $accounts = User::create([
            'name' => 'accounts User',
            'email' => 'accounts@accounts.com',
            'password' => Hash::make('password')

        ]);
        $user = User::create([
            'name' => 'Normal User',
            'email' => 'user@user.com',
            'password' => Hash::make('password')

        ]);

         $superadmin->roles()->attach($superadminRole);
        $admin->roles()->attach($adminRole);
        $purchase->roles()->attach($purchaseRole);
        $accounts->roles()->attach($accountsRole);
        $user->roles()->attach($userRole);
    }
}
