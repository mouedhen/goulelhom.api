<?php

use Illuminate\Database\Seeder;

class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Public lighting'],
            'fr' => ['name' => 'Eclairage public'],
            'ar' => ['name' => 'التنوير العمومي'],
        ]);
        $record->fill(['color' => '#FFFB00']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Public transport'],
            'fr' => ['name' => 'Transport public'],
            'ar' => ['name' => 'النقل العمومي'],
        ]);
        $record->fill(['color' => '#46C6FC']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Administration'],
            'fr' => ['name' => 'Administration'],
            'ar' => ['name' => 'الإدارة'],
        ]);
        $record->fill(['color' => '#AC65DC']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Anarchic constructions'],
            'fr' => ['name' => 'Constructions anarchiques'],
            'ar' => ['name' => 'بناء فوضوي'],
        ]);
        $record->fill(['color' => '#4F4545']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Roads and Sidewalks'],
            'fr' => ['name' => 'Voirie et Trottoir'],
            'ar' => ['name' => 'الطرقات و الأرصفة'],
        ]);
        $record->fill(['color' => '#BC5C03']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Environment and Cleanliness'],
            'fr' => ['name' => 'Environnement et Propreté'],
            'ar' => ['name' => 'البيئة و النظافة'],
        ]);
        $record->fill(['color' => '#77FF00']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Parks and Green Spaces'],
            'fr' => ['name' => 'Parcs et Espaces Verts'],
            'ar' => ['name' => 'الحدائق العامة و المنتزهات'],
        ]);
        $record->fill(['color' => '#418506']);
        $record->save();

        $record = new \App\Models\Metrics\Theme();
        $record->fill([
            'en' => ['name' => 'Citizens participation in municipal works'],
            'fr' => ['name' => 'Implication citoyenne dans le travail municipal'],
            'ar' => ['name' => 'تشريك المواطن في العمل البلدي'],
        ]);
        $record->fill(['color' => '#58A7BF']);
        $record->save();

        $others = new \App\Models\Metrics\Theme();
        $others->fill([
            'en' => ['name' => 'Others'],
            'fr' => ['name' => 'Autres'],
            'ar' => ['name' => 'أخرى'],
        ]);
        $record->fill(['color' => '#551A8B']);
        $others->save();
    }
}
