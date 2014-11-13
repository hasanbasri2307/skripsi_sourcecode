<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class SentrySeeder extends Seeder {
    
    public function run() {
       DB::table('users_groups')->delete();
       DB::table('groups')->delete();
       DB::table('users')->delete();
       DB::table('throttle')->delete();
       
       try
       {
           $group = Sentry::createGroup(array(
               'name' => 'admin',
               'permissions' => array(
                   'admin' => 1,
               ),
           ));
           
           $group = Sentry::createGroup(array(
               'name' => 'client',
               'permissions' => array(
                   'client' => 1,
               ),
           ));
           
           $group = Sentry::createGroup(array(
               'name' => 'cso',
               'permissions' => array(
                   'cso' => 1,
               ),
           ));
       } 
       catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
        {
            echo 'Name field is required';
        }
        catch (Cartalyst\Sentry\Groups\GroupExistsException $e)
        {
            echo 'Group already exists';
        }
        try
        {
           
           
            // Membuat admin baru
            $admin = Sentry::register(array(
                // silahkan ganti sesuai keinginan
                'email'    => 'hasanbasri2307@gmail.com',
                'password' =>'hasan',
                'first_name' => 'Admin',
                'last_name' => 'Hasan'
            ), true); // langsung diaktivasi

            // Cari grup admin
            $adminGroup = Sentry::findGroupByName('admin');

            // Masukkan user ke grup admin
            $admin->addGroup($adminGroup);

            // Membuat user regular baru
            $client = Sentry::register(array(
                // silahkan ganti sesuai keinginan
                'email'    => 'hasanbasri2307@outlook.com',
                'password' => 'hasan',
                'first_name' => 'Client',
                'last_name' => 'Hasan'
            ), true); // langsung diaktivasi

            // Cari grup regular
            $regularGroup = Sentry::findGroupByName('client');

            // Masukkan user ke grup regular
            $client->addGroup($regularGroup);
            
            $cso = Sentry::register(array(
                // silahkan ganti sesuai keinginan
                'email'    => 'hasan.tkj26@gmail.com',
                'password' => 'hasan',
                'first_name' => 'CSO',
                'last_name' => 'Hasan'
            ), true); // langsung diaktivasi

            // Cari grup regular
            $regularGroup = Sentry::findGroupByName('cso');

            // Masukkan user ke grup regular
            $cso->addGroup($regularGroup);

        }
        catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            echo 'Login field is required.';
        }
        catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            echo 'Password field is required.';
        }
        catch (Cartalyst\Sentry\Users\UserExistsException $e)
        {
            echo 'User with this login already exists.';
        }
        catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
        {
            echo 'Group was not found.';
        }
    }
}