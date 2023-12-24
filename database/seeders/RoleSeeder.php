<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        // $roles= [
        //     'admin',
        //     'user'
        // ];
        // foreach($roles as $role){
        //     Role::create([
        //         'name' => $role,
        //     ]);
        // }
        $roles= ['super_admin','admin','user'];
        foreach($roles as $role){
            Role::create([
                'name' => $role,
            ]);
        }
    }
}
