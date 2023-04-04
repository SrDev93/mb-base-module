<?php

namespace Modules\Base\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Entities\Setting;

class BaseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $setting = Setting::firstOrCreate([
            'site_name' => 'Sample Site Name',
            'title' => 'Sample Title',
        ]);
        // $this->call("OthersTableSeeder");
    }
}
