<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UsersSeeder extends Seeder
{

    public function run()
    {
        //membuat role admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        //membuat role member
        $memberRole = new Role();
        $memberRole->name = "member";
        $memberRole->display_name = "Member";
        $memberRole->save();

        //membuat sample admin
        $admin = new User();
        $admin->name = 'Admin Ticket'; 
        $admin->email = 'admin@ticket.com'; 
        $admin->password = bcrypt('tahubulat');
        $admin->save();
        $admin->attachRole($adminRole);

        //membuat sample member
        $admin = new User();
        $admin->name = 'Member Ticket'; 
        $admin->email = 'member@ticket.com'; 
        $admin->password = bcrypt('tahubulat');
        $admin->save();
        $admin->attachRole($memberRole);
    }
}
