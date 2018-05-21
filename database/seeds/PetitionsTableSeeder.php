<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class PetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $organization = new \App\Models\Contacts\Organization();
        $organization->fill([
            'fr' => [
                'name' => 'Autres'
            ],
            'en' => [
                'name' => 'Others'
            ],
            'ar' => [
                'name' => 'أخرى'
            ]
        ]);
        $organization->save();

        $petitioner1 = \App\Models\Contacts\Contact::create([
            'name' => 'Aymen Bel Ateg',
            'phone_number' => '25611662',
            'email' => 'belateg.aymen@gmail.com',
            'address' => 'La goulette',
        ]);
        $petition1 = new \App\Models\Petitions\Petition();
        $petition1->fill([
            'uuid' => (string)Uuid::generate(),
            'start_date' => new Carbon\Carbon('2018-03-05'),
            'end_date' => new Carbon\Carbon('2018-03-05'),
            'name' => 'الكلاب السائبة',
            'description' => 'الكلاب السائبة في حلق الوادي كثرة و فما شكون تضر منهم ىحبو على حل',
            'theme_id' => 9,
            'contact_id' => $petitioner1->id,
            'organization_id' => $organization->id,
            'requested_signatures_number' => 6,
            'status' => 'finished',
        ]);
        $petition1->save();

        $petitioner2 = \App\Models\Contacts\Contact::create([
            'name' => 'جليلة',
            'phone_number' => '21637974',
            'email' => 'ibrahimsalem@gmail.com',
            'address' => '17نهج الشيخ محمد عبد العزيز بوعتور حي تحرير',
        ]);
        $petition2 = new \App\Models\Petitions\Petition();
        $petition2->fill([
            'uuid' => (string)Uuid::generate(),
            'start_date' => new Carbon\Carbon('2018-04-18'),
            'end_date' => new Carbon\Carbon('2018-04-30'),
            'name' => 'مشاكل في قنوات تصريف المياه',
            'description' => 'هناك تسريب في قنوات تصريف المياه مما أدى إلي تلوث الطريق و الروائح الغير محتملة',
            'theme_id' => 9,
            'contact_id' => $petitioner2->id,
            'organization_id' => $organization->id,
            'requested_signatures_number' => 3,
            'status' => 'finished',
        ]);
        $petition2->save();

        $petitioner3 = \App\Models\Contacts\Contact::create([
            'name' => 'طارق النفاتي',
            'phone_number' => '58189585',
            'email' => 'abouda230@gmail.com',
            'address' => '16نهج ابن رشيق حي الحدائق مرناق بن عروس',
        ]);
        $petition3 = new \App\Models\Petitions\Petition();
        $petition3->fill([
            'uuid' => (string)Uuid::generate(),
            'start_date' => new Carbon\Carbon('2018-04-20'),
            'end_date' => new Carbon\Carbon('2018-04-30'),
            'name' => 'منطقة مرناق تستغيث',
            'description' => 'حبيت نلفت انتباهكم على منطقة مرناق اللي غاطسة في الزبلة و الوسخ .. ابداها مالسوق نهار الاحد الانتصاب الفوضوي فوق الترتوار المترجل ميلقاش وين يمشي و في قلب الكياس زادة السيارات ميلقاوش وين يمشيو و بعد ميوفى السوق يبقى الخمج و الروايح بالنهارين و التلاثة و الكراهب اللي تاقف وين مجى و وقت متحب و المساحات الخضراء اللي تم اتلافها و منها اللي تحولت الى المصبات متع زبلة ...',
            'theme_id' => 9,
            'contact_id' => $petitioner3->id,
            'organization_id' => $organization->id,
            'requested_signatures_number' => 10,
            'status' => 'finished',
        ]);
        $petition3->save();
    }
}
