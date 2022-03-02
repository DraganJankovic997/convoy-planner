<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Town;

class TownCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getCountries() as $country) {
            Country::create($country);
        }

        foreach ($this->getTowns() as $town) {
            Town::create($town);
        }
    }

    private function getCountries()
    {
        return [
            ['id' => 1, 'name' => 'Serbia', 'short' => 'RS'],
            ['id' => 2, 'name' => 'Croatia', 'short' => 'CRO'],
            ['id' => 3, 'name' => 'Greece', 'short' => 'GR'],
        ];
    }

    public function getTowns()
    {
        return [
            ['id' => 1, 'name' => 'Novi Sad', 'country_id' => 1],
            ['id' => 2, 'name' => 'Belgrade', 'country_id' => 1],
            ['id' => 3, 'name' => 'Nis', 'country_id' => 1],
            ['id' => 4, 'name' => 'Valjevo', 'country_id' => 1],
            ['id' => 5, 'name' => 'Subotica', 'country_id' => 1],
            ['id' => 6, 'name' => 'Zagreb', 'country_id' => 2],
            ['id' => 7, 'name' => 'Rijeka', 'country_id' => 2],
            ['id' => 8, 'name' => 'Split', 'country_id' => 2],
            ['id' => 9, 'name' => 'Athens', 'country_id' => 3],
            ['id' => 10, 'name' => 'Solun', 'country_id' => 3],
        ];
    }
}
