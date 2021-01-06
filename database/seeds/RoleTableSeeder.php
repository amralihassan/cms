<?php

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $adminRole = Role::create([
            'name'              => 'Admin',
            'display_name'      => 'Administrator',
            'description'       => 'System Administrator, Can do all operations',
            'allowed_route'     => 'admin'
        ]);

        $editorRole = Role::create([
            'name'              => 'editor',
            'display_name'      => 'Supervisor',
            'description'       => 'System Supervisor, Can do all operations',
            'allowed_route'     => 'admin'
        ]);

        $userRole = Role::create([
            'name'              => 'user',
            'display_name'      => 'User',
            'description'       => 'Normal user, Can do all operations',
            'allowed_route'     =>  null
        ]);

        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'username'  => 'admin',
            'mobile'    => '01027266631',
            'password'  => bcrypt('123'),
            'status'    => 1
        ]);

        $admin->attachRole($adminRole);

        $editor = User::create([
            'name'      => 'editor',
            'email'     => 'editor@editor.com',
            'username'  => 'editor',
            'mobile'    => '01027266634',
            'password'  => bcrypt('123'),
            'status'    => 1
        ]);

        $editor->attachRole($editorRole);

        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name'      => $faker->name,
                'email'     => $faker->email,
                'username'  => $faker->userName,
                'mobile'    => '9665' . random_int(10000000, 99999999),
                'email_verified_at' => Carbon::now(),
                'password'  => bcrypt('12345'),
                'status'    => 1
            ]);
            $user->attachRole($userRole);
        }
    }
}
