<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mroles')->insert([
            [
                'role_name' => 'pengguna',
                'role_assign' => 'mmanajemen,mminjam,mkembali,mrole',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
			
        ]);
		// DB::table('musers')->insert([
        //     [
        //         'firstname' => 'dana',
		// 		'lastname' => 'indra',
		// 		'email' => 'dana@grtech.com.my',
		// 		'age' => 30,
        //         'hobby' => 1,
        //         'password' => Hash::make('dana88'),
		// 		'm_role' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
		// 	[
        //         'firstname' => 'dina',
		// 		'lastname' => 'indra',
		// 		'email' => 'dina@grtech.com.my',
		// 		'hobby' => 2,
        //         'age' => 30,
        //         'password' => Hash::make('dina88'),
		// 		'm_role' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'firstname' => 'dani',
		// 		'lastname' => 'indra',
		// 		'email' => 'dani@grtech.com.my',
		// 		'hobby' => 1,
        //         'age' => 30,
        //         'password' => Hash::make('dani88'),
		// 		'm_role' => 2,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        // ]);

        // DB::table('hobbies')->insert([
        //     [
        //         'name' => 'surfing',
		// 		'aktif' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
		// 	[
        //         'name' => 'hiking',
		// 		'aktif' => 1,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]
        // ]);
		
		
    }
}
