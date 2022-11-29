<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles;
use App\Models\RoleUsers;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Readonly',
            'last_name' => 'User',
            'email' => 'readonlyuser@admin.com',
            'password' => bcrypt('data@1234'),
        ]);
        User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'email' => 'user@admin.com',
            'password' => bcrypt('data@1234'),
        ]);
        User::create([
            'first_name' => 'Super',
            'last_name' => 'User',
            'email' => 'superuser@admin.com',
            'password' => bcrypt('data@1234'),
        ]);
        User::create([
            'first_name' => 'FEEI',
            'last_name' => 'Admin',
            'email' => 'feeiadmin@admin.com',
            'password' => bcrypt('data@1234'),
        ]);
        User::create([
            'first_name' => 'Admin',
            'last_name' => '(abss)',
            'email' => 'admin@admin.com',
            'password' => bcrypt('data@1234'),
        ]);


        Roles::create([
            'name' => 'Read-Only User',
            'slug' => 'readonlyuser',
            'permissions' => '{"user.show":false,"user.create":false,"user.edit":false,"user.delete":false,"user.export":false,"persons.show":true,"persons.create":true,"persons.edit":false,"persons.delete":false,"persons.export":false,"organisations.show":true,"organisations.create":true,"organisations.edit":false,"organisations.delete":false,"organisations.export":false,"networkpartners.show":true,"networkpartners.create":true,"networkpartners.edit":false,"networkpartners.delete":false,"networkpartners.export":false,"notes.show":true,"notes.create":true,"notes.edit":true,"notes.delete":true,"branchoffice.show":false,"branchoffice.create":false,"branchoffice.edit":false,"branchoffice.delete":false,"branchoffice.export":false,"city.show":false,"city.create":false,"city.edit":false,"city.delete":false,"city.export":false,"topic.show":false,"topic.create":false,"topic.edit":false,"topic.delete":false,"topic.export":false,"salutation.show":false,"salutation.create":false,"salutation.edit":false,"salutation.delete":false,"salutation.export":false,"titleprefix.show":false,"titleprefix.create":false,"titleprefix.edit":false,"titleprefix.delete":false,"titleprefix.export":false,"titlesuffix.show":false,"titlesuffix.create":false,"titlesuffix.edit":false,"titlesuffix.delete":false,"titlesuffix.export":false,"titleawarded.show":false,"titleawarded.create":false,"titleawarded.edit":false,"titleawarded.delete":false,"titleawarded.export":false,"federalstate.show":false,"federalstate.create":false,"federalstate.edit":false,"federalstate.delete":false,"federalstate.export":false,"functions.show":false,"functions.create":false,"functions.edit":false,"functions.delete":false,"functions.export":false,"status.show":false,"status.create":false,"status.edit":false,"status.delete":false,"status.export":false,"statusperson.show":false,"statusperson.create":false,"statusperson.edit":false,"statusperson.delete":false,"statusperson.export":false,"category.show":false,"category.create":false,"category.edit":false,"category.delete":false,"category.export":false,"country.show":false,"country.create":false,"country.edit":false,"country.delete":false,"country.export":false}',
        ]);
        Roles::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => '{"user.show":false,"user.create":false,"user.edit":false,"user.delete":false,"user.export":false,"persons.show":true,"persons.create":true,"persons.edit":true,"persons.delete":false,"persons.export":true,"organisations.show":true,"organisations.create":true,"organisations.edit":true,"organisations.delete":false,"organisations.export":true,"networkpartners.show":true,"networkpartners.create":true,"networkpartners.edit":true,"networkpartners.delete":false,"networkpartners.export":true,"notes.show":true,"notes.create":true,"notes.edit":true,"notes.delete":true,"branchoffice.show":false,"branchoffice.create":false,"branchoffice.edit":false,"branchoffice.delete":false,"branchoffice.export":false,"city.show":false,"city.create":false,"city.edit":false,"city.delete":false,"city.export":false,"topic.show":false,"topic.create":false,"topic.edit":false,"topic.delete":false,"topic.export":false,"salutation.show":false,"salutation.create":false,"salutation.edit":false,"salutation.delete":false,"salutation.export":false,"titleprefix.show":false,"titleprefix.create":false,"titleprefix.edit":false,"titleprefix.delete":false,"titleprefix.export":false,"titlesuffix.show":false,"titlesuffix.create":false,"titlesuffix.edit":false,"titlesuffix.delete":false,"titlesuffix.export":false,"titleawarded.show":false,"titleawarded.create":false,"titleawarded.edit":false,"titleawarded.delete":false,"titleawarded.export":false,"federalstate.show":false,"federalstate.create":false,"federalstate.edit":false,"federalstate.delete":false,"federalstate.export":false,"functions.show":false,"functions.create":false,"functions.edit":false,"functions.delete":false,"functions.export":false,"status.show":false,"status.create":false,"status.edit":false,"status.delete":false,"status.export":false,"statusperson.show":false,"statusperson.create":false,"statusperson.edit":false,"statusperson.delete":false,"statusperson.export":false,"category.show":false,"category.create":false,"category.edit":false,"category.delete":false,"category.export":false,"country.show":false,"country.create":false,"country.edit":false,"country.delete":false,"country.export":false}',
        ]);
        Roles::create([
            'name' => 'Super-User',
            'slug' => 'superuser',
            'permissions' => '{"user.show":true,"user.create":true,"user.edit":true,"user.delete":true,"user.export":true,"persons.show":true,"persons.create":true,"persons.edit":true,"persons.delete":true,"persons.export":true,"organisations.show":true,"organisations.create":true,"organisations.edit":true,"organisations.delete":true,"organisations.export":true,"networkpartners.show":true,"networkpartners.create":true,"networkpartners.edit":true,"networkpartners.delete":true,"networkpartners.export":true,"notes.show":true,"notes.create":true,"notes.edit":true,"notes.delete":true,"branchoffice.show":false,"branchoffice.create":false,"branchoffice.edit":false,"branchoffice.delete":false,"branchoffice.export":false,"city.show":false,"city.create":false,"city.edit":false,"city.delete":false,"city.export":false,"topic.show":false,"topic.create":false,"topic.edit":false,"topic.delete":false,"topic.export":false,"salutation.show":false,"salutation.create":false,"salutation.edit":false,"salutation.delete":false,"salutation.export":false,"titleprefix.show":false,"titleprefix.create":false,"titleprefix.edit":false,"titleprefix.delete":false,"titleprefix.export":false,"titlesuffix.show":false,"titlesuffix.create":false,"titlesuffix.edit":false,"titlesuffix.delete":false,"titlesuffix.export":false,"titleawarded.show":false,"titleawarded.create":false,"titleawarded.edit":false,"titleawarded.delete":false,"titleawarded.export":false,"federalstate.show":false,"federalstate.create":false,"federalstate.edit":false,"federalstate.delete":false,"federalstate.export":false,"functions.show":false,"functions.create":false,"functions.edit":false,"functions.delete":false,"functions.export":false,"status.show":false,"status.create":false,"status.edit":false,"status.delete":false,"status.export":false,"statusperson.show":false,"statusperson.create":false,"statusperson.edit":false,"statusperson.delete":false,"statusperson.export":false,"category.show":false,"category.create":false,"category.edit":false,"category.delete":false,"category.export":false,"country.show":false,"country.create":false,"country.edit":false,"country.delete":false,"country.export":false}',
        ]);
        Roles::create([
            'name' => 'FEEI Admin',
            'slug' => 'feeiadmin',
            'permissions' => '{"user.show":true,"user.create":true,"user.edit":true,"user.delete":true,"user.export":true,"persons.show":true,"persons.create":true,"persons.edit":true,"persons.delete":true,"persons.export":true,"organisations.show":true,"organisations.create":true,"organisations.edit":true,"organisations.delete":true,"organisations.export":true,"networkpartners.show":true,"networkpartners.create":true,"networkpartners.edit":true,"networkpartners.delete":true,"networkpartners.export":true,"notes.show":true,"notes.create":true,"notes.edit":true,"notes.delete":true,"branchoffice.show":true,"branchoffice.create":true,"branchoffice.edit":true,"branchoffice.delete":true,"branchoffice.export":true,"city.show":true,"city.create":true,"city.edit":true,"city.delete":true,"city.export":true,"topic.show":true,"topic.create":true,"topic.edit":true,"topic.delete":true,"topic.export":true,"salutation.show":true,"salutation.create":true,"salutation.edit":true,"salutation.delete":true,"salutation.export":true,"titleprefix.show":true,"titleprefix.create":true,"titleprefix.edit":true,"titleprefix.delete":true,"titleprefix.export":true,"titlesuffix.show":true,"titlesuffix.create":true,"titlesuffix.edit":true,"titlesuffix.delete":true,"titlesuffix.export":true,"titleawarded.show":true,"titleawarded.create":true,"titleawarded.edit":true,"titleawarded.delete":true,"titleawarded.export":true,"federalstate.show":true,"federalstate.create":true,"federalstate.edit":true,"federalstate.delete":true,"federalstate.export":true,"functions.show":true,"functions.create":true,"functions.edit":true,"functions.delete":true,"functions.export":true,"status.show":true,"status.create":true,"status.edit":true,"status.delete":true,"status.export":true,"statusperson.show":true,"statusperson.create":true,"statusperson.edit":true,"statusperson.delete":true,"statusperson.export":true,"category.show":true,"category.create":true,"category.edit":true,"category.delete":true,"category.export":true,"country.show":true,"country.create":true,"country.edit":true,"country.delete":true,"country.export":true}',
        ]);
        Roles::create([
            'name' => 'Admin (abss)',
            'slug' => 'admin',
            'permissions' => '{"user.show":true,"user.create":true,"user.edit":true,"user.delete":true,"user.export":true,"persons.show":true,"persons.create":true,"persons.edit":true,"persons.delete":true,"persons.export":true,"organisations.show":true,"organisations.create":true,"organisations.edit":true,"organisations.delete":true,"organisations.export":true,"networkpartners.show":true,"networkpartners.create":true,"networkpartners.edit":true,"networkpartners.delete":true,"networkpartners.export":true,"notes.show":true,"notes.create":true,"notes.edit":true,"notes.delete":true,"branchoffice.show":true,"branchoffice.create":true,"branchoffice.edit":true,"branchoffice.delete":true,"branchoffice.export":true,"city.show":true,"city.create":true,"city.edit":true,"city.delete":true,"city.export":true,"topic.show":true,"topic.create":true,"topic.edit":true,"topic.delete":true,"topic.export":true,"salutation.show":true,"salutation.create":true,"salutation.edit":true,"salutation.delete":true,"salutation.export":true,"titleprefix.show":true,"titleprefix.create":true,"titleprefix.edit":true,"titleprefix.delete":true,"titleprefix.export":true,"titlesuffix.show":true,"titlesuffix.create":true,"titlesuffix.edit":true,"titlesuffix.delete":true,"titlesuffix.export":true,"titleawarded.show":true,"titleawarded.create":true,"titleawarded.edit":true,"titleawarded.delete":true,"titleawarded.export":true,"federalstate.show":true,"federalstate.create":true,"federalstate.edit":true,"federalstate.delete":true,"federalstate.export":true,"functions.show":true,"functions.create":true,"functions.edit":true,"functions.delete":true,"functions.export":true,"status.show":true,"status.create":true,"status.edit":true,"status.delete":true,"status.export":true,"statusperson.show":true,"statusperson.create":true,"statusperson.edit":true,"statusperson.delete":true,"statusperson.export":true,"category.show":true,"category.create":true,"category.edit":true,"category.delete":true,"category.export":true,"country.show":true,"country.create":true,"country.edit":true,"country.delete":true,"country.export":true}',
        ]);

        RoleUsers::create([
            'user_id' => '1',
            'role_id' => '1',
        ]);

        RoleUsers::create([
            'user_id' => '2',
            'role_id' => '2',
        ]);

        RoleUsers::create([
            'user_id' => '3',
            'role_id' => '3',
        ]);

        RoleUsers::create([
            'user_id' => '4',
            'role_id' => '4',
        ]);

        RoleUsers::create([
            'user_id' => '5',
            'role_id' => '5',
        ]);

    }
}
