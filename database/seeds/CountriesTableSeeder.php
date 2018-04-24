<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new \App\Models\Locations\Country();
        $country->fill([
            'en' => ['name' => 'Tunisia'],
            'fr' => ['name' => 'Tunisie'],
            'ar' => ['name' => 'تونس'],
        ]);
        $country->save();

        $city = new \App\Models\Locations\City();
        $city->fill([
            'en' => ['name' => 'Tunis'],
            'fr' => ['name' => 'Tunis'],
            'ar' => ['name' => 'تونس'],
        ]);
        $city->fill(['country_id' => 1]);
        $city->save();

        $tunis = new \App\Models\Locations\Municipality();
        $tunis->fill([
            'en' => ['name' => 'Municipality of Tunis'],
            'fr' => ['name' => 'Municipalité de Tunis'],
            'ar' => ['name' => 'بلدية تونس'],
        ]);
        $tunis->fill(['city_id' => 1]);
        $tunis->save();

        $carthage = new \App\Models\Locations\Municipality();
        $carthage->fill([
            'en' => ['name' => 'Municipality of Carthage'],
            'fr' => ['name' => 'Municipalité de Carthage'],
            'ar' => ['name' => 'بلدية قرطاج'],
        ]);
        $carthage->fill(['city_id' => 1]);
        $carthage->save();

        $sidiBou = new \App\Models\Locations\Municipality();
        $sidiBou->fill([
            'en' => ['name' => 'Municipality of Sidi Bou Said'],
            'fr' => ['name' => 'Municipalité de Sidi Bou Said'],
            'ar' => ['name' => 'بلدية سيدي بو سعيد'],
        ]);
        $sidiBou->fill(['city_id' => 1]);
        $sidiBou->save();

        $bardo = new \App\Models\Locations\Municipality();
        $bardo->fill([
            'en' => ['name' => 'Municipality of Bardo'],
            'fr' => ['name' => 'Municipalité de Bardo'],
            'ar' => ['name' => 'بلدية باردو'],
        ]);
        $bardo->fill(['city_id' => 1]);
        $bardo->save();

        $sidiHsin = new \App\Models\Locations\Municipality();
        $sidiHsin->fill([
            'en' => ['name' => 'Municipality of Sidi Hassine'],
            'fr' => ['name' => 'Municipalité de Sidi Hassine'],
            'ar' => ['name' => 'بلدية سيدي حسين'],
        ]);
        $sidiHsin->fill(['city_id' => 1]);
        $sidiHsin->save();

        $goulette = new \App\Models\Locations\Municipality();
        $goulette->fill([
            'en' => ['name' => 'Municipality of the Goulette'],
            'fr' => ['name' => 'Municipalité de la Goulette'],
            'ar' => ['name' => 'بلدية حلق الوادي'],
        ]);
        $goulette->fill(['city_id' => 1]);
        $goulette->save();

        $kram = new \App\Models\Locations\Municipality();
        $kram->fill([
            'en' => ['name' => 'Municipality of Kram'],
            'fr' => ['name' => 'Municipalité du Kram'],
            'ar' => ['name' => 'بلدية الكرم'],
        ]);
        $kram->fill(['city_id' => 1]);
        $kram->save();

        $marsa = new \App\Models\Locations\Municipality();
        $marsa->fill([
            'en' => ['name' => 'Municipality of Marsa'],
            'fr' => ['name' => 'Municipalité de la Marsa'],
            'ar' => ['name' => 'بلدية المرسى'],
        ]);
        $marsa->fill(['city_id' => 1]);
        $marsa->save();

        $others = new \App\Models\Locations\Municipality();
        $others->fill([
            'en' => ['name' => 'Others'],
            'fr' => ['name' => 'Autres'],
            'ar' => ['name' => 'أخرى'],
        ]);
        $others->fill(['city_id' => 1]);
        $others->save();
    }
}
