<?php

use App\Models\Contacts\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("
        INSERT INTO `contacts` (`id`, `name`, `phone_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(15, '" . encrypt('Mohamed Mouedhen') . "', '" . encrypt('mouedhen.pro@gmail.com') . "', '" . encrypt('52351566') . "', '" . encrypt('Borj Cédria') . "', '2018-04-19 23:52:07', '2018-04-19 23:52:07'),
(20, '" . encrypt('Zied Zarrai') . "', '" . encrypt('zied.zarrai@gmail.com') . "', '" . encrypt('') . "', '" . encrypt('') . "', '2018-04-23 11:57:39', '2018-04-23 12:00:07'),
(22, '" . encrypt('Wassim Msalmi') . "', '" . encrypt('wassimmsalmiphotograph') . "', '" . encrypt('') . "', '" . encrypt('') . "', '2018-04-23 15:17:51', '2018-04-23 15:17:51'),
(23, '" . encrypt('Wassim Msalmi') . "', '" . encrypt('Wassimmsalmiphotography@gmail.com') . "', '" . encrypt('') . "', '" . encrypt('') . "', '2018-04-23 16:11:07', '2018-04-23 16:11:07'),
(24, '" . encrypt('Khouloud tlili') . "', '" . encrypt('Khouloud.tlili@raj-tunisie.org') . "', '" . encrypt('27961015') . "', '" . encrypt('15 rue Marie Curie Mourouj 2 Tunis') . "', '2018-04-23 19:17:37', '2018-04-23 19:17:37'),
(25, '" . encrypt('Wafa Hmadi') . "', '" . encrypt('Wafa.hmadi@raj-tunisie.org') . "', '" . encrypt('52124296') . "', '" . encrypt('Cité Avicenne') . "', '2018-04-23 19:20:25', '2018-04-23 19:20:25'),
(26, '" . encrypt('Zied ZARRAI') . "', '" . encrypt('zarrai.zied@gmail.com') . "', '" . encrypt('50734131') . "', '" . encrypt('15 rue 18 janvier 1952 Tunis 1001') . "', '2018-04-23 19:39:54', '2018-04-23 19:39:54'),
(27, '" . encrypt('Wassim msalmi') . "', '" . encrypt('Wassimmsalmiphotography@gmail.com') . "', '" . encrypt('21585841') . "', '" . encrypt('') . "', '2018-04-23 20:01:15', '2018-04-23 20:01:15'),
(28, '" . encrypt('Mohamed derbel') . "', '" . encrypt('mohamed.derbal88@gmail.com') . "', '" . encrypt('54405335') . "', '" . encrypt('Tunis') . "', '2018-04-23 20:55:49', '2018-04-23 20:55:49'),
(29, '" . encrypt('Mohamed derbel') . "', '" . encrypt('mohamed.derbal88@gmail.com') . "', '" . encrypt('54405335') . "', '" . encrypt('Tunis') . "', '2018-04-23 20:55:49', '2018-04-23 20:55:49');

        ");
        DB::statement('ALTER TABLE contacts AUTO_INCREMENT=30');

        $record = new Contact();
        $record->fill([
            'name' => 'وليد عباسي',
            'phone_number' => '26251491',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Khouloud Tlili',
            'phone_number' => '27961015',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Haifa Touati',
            'phone_number' => '27961015',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Mohamed Chams Eddin Mouedhen',
            'phone_number' => '27961015',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'محمد بن صالح',
            'phone_number' => '25618232',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'حمادي النصراوي',
            'phone_number' => '97586234',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'zied',
            'phone_number' => '50734141',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'oumaima',
            'phone_number' => '23456789',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Bouhejba zied',
            'phone_number' => '50487183',
            'address' => 'rue karatchi le bardo'
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'حامد رحيمي',
            'phone_number' => '35546159',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'سمير',
            'phone_number' => '20444954',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Wassim msalmi',
            'phone_number' => '21521582',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'ayoub',
            'phone_number' => '23568985',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'maram',
            'phone_number' => '99141402',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'عربي',
            'phone_number' => '22960133',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'عبد الحميد شغام',
            'phone_number' => '200200020000',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'el hachmi ben Aazouz',
            'phone_number' => '92551183',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Thouraya',
            'phone_number' => '25086304',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Hbiba',
            'phone_number' => '27928961',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Zaara Hkimi',
            'phone_number' => '20594921',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'Sili Ismaiel',
            'phone_number' => '99063673',
        ]);
        $record->save();

        $record = new Contact();
        $record->fill([
            'name' => 'وسيم مسلمي',
            'phone_number' => '21585841',
        ]);
        $record->save();

        DB::statement("
        INSERT INTO `complains` (`id`, `subject`, `description`, `longitude`, `latitude`, `is_new`, `is_moderated`, `is_valid`, `has_approved_sworn_statement`, `has_approved_term_of_use`, `theme_id`, `contact_id`, `municipality_id`, `created_at`, `updated_at`) VALUES
(1, 'Environnement et Propreté', 'Dechet des travaux de RFR à la rue de Bab El Falla', '10.1787794', '36.7872141', 0, 1, 1, 0, 0, 6, 30, 1, '2018-02-13 03:06:04', '2018-04-02 07:32:58'),
(2, 'Transport public', 'les retards des métros de la ligne 6 à cause des travaux de l\'installation des nouveaux rails entre les 2 arrêts Med Ali et Med Manachou', '10.1973724', '36.7421426', 0, 1, 1, 0, 0, 2, 31, 1, '2018-02-13 03:10:43', '2018-02-25 23:26:22'),
(3, 'Environnement et Propreté', 'pas de trottoir', '10.1795733', '36.8128070', 0, 1, 1, 0, 0, 6, 32, 1, '2018-02-13 07:14:11', '2018-02-25 23:26:14'),
(5, 'Administration', 'هدم مساكن', NULL, NULL, 0, 1, 1, 0, 0, 3, 34, 1, '2018-02-16 07:13:09', '2018-03-27 10:02:25'),
(6, 'Constructions anarchiques', 'الإنتصاب الفوضوي يمنع تجار السوق البلدي من القيام بعملهم', NULL, NULL, 0, 1, 1, 0, 0, 4, 35, 5, '2018-02-19 09:58:38', '2018-02-25 23:25:57'),
(52, 'Environnement et Propreté', 'il n ya pas de Conteneurs à déchets dans le rue de karatchi au bardo ce qui engendre des points noirs et des cumuls de poubelle ce qui encombre le trottoir et la rue inhibe la circulation et crée une atmosphère polluée moustique, chat, chien et mauvaise odeur...', '10.1366740', '36.8136225', 0, 1, 1, 0, 0, 6, 38, 4, '2018-03-21 07:31:32', '2018-03-27 10:00:35'),
(53, 'Environnement et Propreté', 'بيع مواد غذائية و مواد إستهلاكية منتهية الصلوحية دون إحترام قوانين كيفية حفض وبيع هاته المواد وفي غياب تام لمصلحة حفظ الصحة ومنظمة الدفاع عن المستهلك', '10.0579834', '36.7119168', 0, 1, 1, 0, 0, 6, 39, 1, '2018-03-22 13:20:24', '2018-03-27 09:59:38'),
(54, 'Parcs et Espaces Verts', 'حرق غابات', '10.1902485', '36.7597223', 0, 1, 1, 0, 0, 7, 39, 1, '2018-03-22 13:38:27', '2018-03-27 09:57:19'),
(56, 'Environnement et Propreté', 'فيضانات كل ماتصب المطر في شارع الحبيب بورقيبة', '10.3029404', '36.8175073', 0, 1, 1, 0, 0, 6, 40, 6, '2018-03-27 06:31:59', '2018-03-27 09:56:47'),
(58, 'Voirie et Trottoir', 'شوف البوليسية فاش يعملو', '10.1460184', '36.8196248', 0, 0, 1, 0, 0, 5, 41, 1, '2018-04-02 15:41:34', '2018-04-03 06:36:16'),
(59, 'Parcs et Espaces Verts', 'montazeh el bratel chbih wala parking lel kraheb', '10.2936793', '36.8393833', 1, 0, 0, 0, 0, 7, 37, 6, '2018-04-10 11:35:29', '2018-04-10 11:35:29'),
(61, 'Parcs et Espaces Verts', 'عدم وجود أماكن يمكن للأطفال اللّعب فيها (حدائق، ملاعب..) و إن وجدت فهي في حالة يرثى لها (غير مهيّئة كليّا أو تستعمل لأغراض أخرى). الرّجاء التّعامل مع هذا المشكل بكل جدّية نظرا لأهمّيته الكبرى بالإضافة الى عدّة مشاكل أخرى كالإضاءة العموميّة  ..إلخ \n(صغارنا يلعبو في الشارع منهم للكراهب و الزبلة و البراكاجات و الخلط و الفساد بعد نقولو شبيهم طالعين هكة؛مدام فما صغار يطالبو بحاجات كيما هكّا معناها مزال فمّا أمل من واجب البلديّة تنمّيه موش تقضي عليه)\nفي منطقة بوسلسلة تحديدا', '10.0794411', '36.7800048', 0, 1, 1, 0, 0, 7, 43, 8, '2018-04-15 15:11:59', '2018-04-16 10:25:43'),
(62, 'Administration', 'steg bech ibadlouli dejencteur 32 met3 el mongala eltawa mabadlouhouli ma3a el3lim kalisthom men le 02/08/2017 kol manimchilhom i9ololi hana jayenk wba3 myjouch waker mara 9alouli manach lahinn inrakbo tawa lahin in9osso fi ضو bellahi kan itnajmou itwaslouli souti yarhim waldikom😞😞😞😞😞😞😞😒', '10.1138592', '36.7704486', 0, 0, 0, 0, 0, 3, 44, 5, '2018-04-19 07:33:57', '2018-04-19 11:42:42'),
(63, 'Voirie et Trottoir', 'البلاصة هاذي الترتوار الكل عاملينو قهاوي و مطاعم وين البلدية وين الوالي و الا نسيت الوالي الي حب ينظف طارو بيه ...\nقوللهم عندكم مهمة كبيرة بارشا تو و انشالله تنجمو تبدلو حاجة ...', '10.1688688', '36.8659118', 0, 0, 0, 0, 0, 5, 41, 1, '2018-04-19 09:58:32', '2018-04-19 11:41:51'),
(64, 'Voirie et Trottoir', 'البلاصة هاذي الترتوار الكل عاملينو قهاوي و مطاعم وين البلدية وين الوالي و الا نسيت الوالي الي حب ينظف طارو بيه ... قوللهم عندكم مهمة كبيرة بارشا تو و انشالله تنجمو تبدلو حاجة ...', '10.1660000', '36.8188000', 1, 0, 0, 0, 0, 5, 41, 1, '2018-04-19 10:00:36', '2018-04-19 10:00:36'),
(65, 'Voirie et Trottoir', 'تجي تفهم تدوخ ههههه قلو قوللهم هاو قايللهم عالاخر ههههه', '10.1342822', '36.8118960', 0, 0, 1, 0, 0, 5, 45, 4, '2018-04-19 13:03:48', '2018-04-19 14:21:39'),
(66, 'Administration', 'افتكاك أرض', '10.3458595', '36.8698709', 0, 0, 1, 0, 0, 3, 46, 3, '2018-04-19 14:58:03', '2018-04-20 06:11:49'),
(67, 'Environnement et Propreté', 'مصب فظالات', '10.1356602', '36.8222028', 0, 0, 1, 0, 0, 6, 47, 1, '2018-04-19 15:03:05', '2018-04-20 06:11:12'),
(68, 'Environnement et Propreté', 'mssab zebla el kol hdhena, namous f sif w kayasset mkasra wel kleb elsayba .. chare3 mohamed bel9adhi el balasat el mayla', '10.1998615', '36.8309968', 0, 0, 1, 0, 0, 6, 48, 1, '2018-04-20 06:10:31', '2018-04-20 06:11:00'),
(69, 'Administration', 'طلب مال مقابل رفع الفضالات  .. 2dt kol wahed bech yhezlo zebelto', '10.1439857', '36.7975329', 1, 0, 0, 0, 0, 3, 49, 1, '2018-04-20 14:50:04', '2018-04-20 14:50:04'),
(70, 'Voirie et Trottoir', 'nhebo passage piétons wala Passerelle fi hhay el khadhra kodem clinique Ibno Zoher.', '10.9920162', '33.8055221', 1, 0, 0, 0, 0, 5, 50, 1, '2018-04-20 15:29:48', '2018-04-20 15:29:48'),
(71, 'Voirie et Trottoir', 'المنقالة الحاجة الوحيد الي تعجب في هالبلاد و زيد ما تشعلش بلقدا ..', '10.1851639', '36.8005590', 1, 0, 0, 0, 0, 5, 51, 1, '2018-04-23 19:41:25', '2018-04-23 19:41:25');

        ");

        DB::statement('ALTER TABLE complains AUTO_INCREMENT=72');
    }
}
