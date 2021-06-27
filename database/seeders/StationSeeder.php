<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = array('Cairo', 'Alexandria', 'Giza', 'Port Said','Suez', 'Luxor','Asyūţ', 'Al Manşūrah','Tanda','Al Fayyūm','Zagazig' ,'Ismailia','Aswan','Ḩalwān','Al Minyā');

        foreach ($stations as $station) {
            DB::table('stations')->insert(['name' => $station]);
        }
    }
}
