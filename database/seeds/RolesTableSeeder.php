<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{

	use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->disableForeignKeys();

        //Add the master administrator, user id of 1
    	$roles = [
    		[
    			'name'        => 'admin',
    			'created_at'        => Carbon::now(),
    			'updated_at'        => Carbon::now(),
    		],
    		[
    			'name'        => 'service_provider',
    			'created_at'        => Carbon::now(),
    			'updated_at'        => Carbon::now(),
    		],
    		[
    			'name'        => 'user',
    			'created_at'        => Carbon::now(),
    			'updated_at'        => Carbon::now(),
    		],
    	];

    	DB::table('roles')->insert($roles);

    	$this->enableForeignKeys();
    }
}
