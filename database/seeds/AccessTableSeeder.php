<?php

use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;

/**
 * Class AccessTableSeeder.
 */
class AccessTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        $this->call(RoleTableSeeder::class);

        $this->enableForeignKeys();
    }
}
