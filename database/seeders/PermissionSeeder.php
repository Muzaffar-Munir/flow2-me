<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions=[
            'boxCategory_create','boxCategory_update','boxCategory_delete',
            'product_create','product_update','product_delete',
            'brand_create','brand_update','brand_delete',
            'box_create','box_update','box_delete',
            'box_images_create','box_images_update','box_images_delete',
            'box_background_create','box_background_update','box_background_delete',
            'manage_admin_create','manage_admin_update','manage_admin_delete',
            'role_create','role_update','role_delete',
            'permission_create','permission_update','permission_delete',
            'contact_us_create','contact_us_update','contact_us_delete',
            'faq_create','faq_update','faq_delete',
            'provably_fair_create','provably_fair_update','provably_fair_delete',
            'cookie_policy_create','cookie_policy_update','cookie_policy_delete',
            'term_condition_create','term_condition_update','term_condition_delete',
            'aml_policy_create','aml_policy_update','aml_policy_delete',
            'privacy_statement_create','privacy_statement_update','privacy_statement_delete',
            'battle_content_create','battle_content_update','battle_content_delete',
            'footer_logo_create','footer_logo_update','footer_logo_delete',
            'footer_icon_create','footer_icon_update','footer_icon_delete',
           
        ];
        foreach($permissions as $permission){
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }
    
    }
}
