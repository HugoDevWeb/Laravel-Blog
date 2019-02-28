<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->truncate();
        $user = new User();
        $user->name = 'Hugo';
        $user->is_admin = 1;
        $user->email = 'hugo.lavergne@devinci.fr';
        $user->password = bcrypt('password');
        $user->save();
    }
}
