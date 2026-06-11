<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 100,
                'title' => 'appointment_enquiry_show',
            ],
            [
                'id'    => 101,
                'title' => 'appointment_enquiry_delete',
            ],
            [
                'id'    => 102,
                'title' => 'appointment_enquiry_access',
            ],
            [
                'id'    => 103,
                'title' => 'contact_enquiry_show',
            ],
            [
                'id'    => 104,
                'title' => 'contact_enquiry_delete',
            ],
            [
                'id'    => 105,
                'title' => 'contact_enquiry_access',
            ],
            [
                'id'    => 106,
                'title' => 'website_setting_access',
            ],
            [
                'id'    => 107,
                'title' => 'website_setting_edit',
            ],
            [
                'id'    => 108,
                'title' => 'patient_review_create',
            ],
            [
                'id'    => 109,
                'title' => 'patient_review_edit',
            ],
            [
                'id'    => 110,
                'title' => 'patient_review_show',
            ],
            [
                'id'    => 111,
                'title' => 'patient_review_delete',
            ],
            [
                'id'    => 112,
                'title' => 'patient_review_access',
            ],
            [
                'id'    => 113,
                'title' => 'faq_create',
            ],
            [
                'id'    => 114,
                'title' => 'faq_edit',
            ],
            [
                'id'    => 115,
                'title' => 'faq_delete',
            ],
            [
                'id'    => 116,
                'title' => 'faq_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
