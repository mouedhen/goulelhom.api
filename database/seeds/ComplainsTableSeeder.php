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
(15, 'eyJpdiI6IjJCdUdhK2NJVVdXTjRqUFlSeUZCSHc9PSIsInZhbHVlIjoiVHFrYlhlYWxGK3VBam1MVjI5VUh5Q0RicGFaZlVRK0szU2I0aEg4MXY0UT0iLCJtYWMiOiI0OGVhNTAwYWM3MGNmYzVkMjRhMGU1ZGI0NTE3MjcxYjVlY2VmMmQ3ZmRmMTQ4MWFiNjEzYjEyOTNlZmEyYjJmIn0=', 'eyJpdiI6Ijk4NDhxS1NVVUU1b2YyVEY1MU9XYWc9PSIsInZhbHVlIjoiSCtJaEN0dDJ0dUUwYzJZbFo4cEFOQT09IiwibWFjIjoiNGExMmQzNTQ5Nzk5NTMyOWVmNDdlNGI2MmFlMWJiZWE5MzZkMmI3ZWE4MGI1M2ZiYzIwNmMyYzI3MmE2NmE1NyJ9', 'eyJpdiI6Ijl1VnRiRzkrUXVMTXduVms4N1dYd2c9PSIsInZhbHVlIjoiMG9BWEw1VzRSbFlnVFpcL1wvMkVvRmxCM2x3NGhDVlloVHM1RmN5UXVsVE9FPSIsIm1hYyI6IjZmNjU3ZmU3MjVlMmI1MzY0MWY0NWU5ZjM4YmI0NDE4MmIxZjc5MTFkNzJmZGYxNjE1YjhmYjJlZGE0NTQxZjgifQ==', 'eyJpdiI6IkQ2XC9ONm1DWEtacGFNNkFlWTBQdml3PT0iLCJ2YWx1ZSI6ImF1ZmhpVnFmcUp3RGgwemF4enUwWnJtRFJ6VWxEZnRyUjFMTG13U1wvcGI0PSIsIm1hYyI6IjkxMjdjYmRlZjY2ZDAxZjNlY2Y2ZDdkZjU1MjUwOWNjMTY0N2VmNzM1ZDYyNGE2NTliYzYxZGJjOWExNTJhY2EifQ==', '2018-04-19 23:52:07', '2018-04-19 23:52:07'),
(20, 'eyJpdiI6ImlYdFZJeE1kbWFMUGxqTVpZb3ZqNWc9PSIsInZhbHVlIjoidFdQUHJGUm5KTWVYWnRZYUpqM3pzejYxa1Rod3hIYzV5MkNtQ01hWjg5Zz0iLCJtYWMiOiI3NDEwMmM5MjQ4NzJkMDgzNTJjODdhMzQ0OTY3NmQ5NzAwNWRkNDA5NzQ4OTEwODM2YjZlZDE5YjdhYzZhY2I5In0=', 'eyJpdiI6InNzcFZyTzd3Q0xWQVwvQ3NWeWpoY2FnPT0iLCJ2YWx1ZSI6ImFPb2g4djJjeXpUTmp0XC9TRXhIVkxnPT0iLCJtYWMiOiI2ZjQ2NGI2Yzg0OTllNWFjN2ViNGNjZWE4N2FmZTc2MDMyNWVlYTNhNzUzODVjOGNmMWQ3ODYxZWE5MjIyMzc4In0=', 'eyJpdiI6IlFvTFlwZFBnTkNcL0RUbzJcL2NmcnE2QT09IiwidmFsdWUiOiJKUGJiTXRLaUhIak5Ob0ZVVlErVGx4WlF6V002UkZzSGJraUhXY1wva0hJND0iLCJtYWMiOiI3MGQxMTU5OTZhZGE1YTdlMzUwZDJiYmMyZjU5ZDQ2ODcxM2U4Yjk2ZDQ5OTA4ZDFiOTA3MGIyYjY4Y2M5OTkwIn0=', 'eyJpdiI6InNOOWw0OGh0bFkzU01GWFVhTWduaEE9PSIsInZhbHVlIjoidWsraFBJaFIzYlwvV1dFRHFIOFhtYkE9PSIsIm1hYyI6ImE1MmE2ZTYwOWNjOWY5NjM3NTNmZDUwMDM5NGUxMDZkOTEwMDNlMDIwMjY0M2RkNzI5MmE5YmYzODhjOTUyZDQifQ==', '2018-04-23 11:57:39', '2018-04-23 12:00:07'),
(22, 'eyJpdiI6Ik5wSFJxeUdzcndOWTFXU1BIT2JCTWc9PSIsInZhbHVlIjoic040a1NzK2cyMEJHV3lDeFVPcnAxVEdLYUdXQkJNV3hCb09WUzRtWkI0ST0iLCJtYWMiOiJkNWRiMjY4MzAxZjFlYjNlMDhiNGU3MjI0MzE3MWMzZmE5MWE4MzE5NDA2MDQxM2U1YWM2MDgwOGY5Y2M1MDA1In0=', 'eyJpdiI6IkRoK3puQ1hOdVg2VXZrUTMrWlpXVUE9PSIsInZhbHVlIjoiYkt0b1FDdVwvR0dSalNkcUJvVVBjZ2c9PSIsIm1hYyI6ImYwZjc3M2U0ZGI1YWM5Njc4YzE4NzE1MmE1NWM1N2U4OThlZGZiMmEwMDA2OTE2NDk2NmM4ZGZkMGE3NWRhMDkifQ==', 'eyJpdiI6InlreUNLb2dKRm1TRmhpdFc1WGRYUGc9PSIsInZhbHVlIjoiXC9oOEF0UWkwRjE2eTJmMzdrTWhEa3NKa0doUTQ3QkxkcUZUcStGQWJUaFE9IiwibWFjIjoiNWI1ZThlMmIwMDU3MzEwNGE5ZjA4NDg2ZTU5MjUxNzY5ODY4YWE0MmUxZmQxMTI4YWE0MDFkZjFkZjc2NDYzOSJ9', 'eyJpdiI6Ijc1TXJ4dzlvYks3aHFGQmttYkFLdUE9PSIsInZhbHVlIjoiRFU0V0VTYmVSZDIrNU9JaG1aV2tjQT09IiwibWFjIjoiODFmYjk4NDlmMGIxZTc5OTAzMjVlYzhhMjJlYzkxYmM5N2I1ZTU3YjIwMjZjNTdiMzlmMGU2Yjk1ZmZiMmRkYSJ9', '2018-04-23 15:17:51', '2018-04-23 15:17:51'),
(23, 'eyJpdiI6InBicHhqbHdGRFhWbE9EcFRqQ3YrYmc9PSIsInZhbHVlIjoianhETDdTRGFURTlNMlhmUlZOWlo0blROZ3oyNGxlVUpVVDYwT0ZHZ01taz0iLCJtYWMiOiI5ODc4NzQ5MjQwOGVjZjk2YjcxNmMzMmQ5NDJkZjk1ZDdmMGFhNDgzN2Q0MTg2MTg4MDAyMzdmYmFiNzE3YzAyIn0=', 'eyJpdiI6InQ0WVBjV25XMHNCNGVvd2hESXhFK3c9PSIsInZhbHVlIjoiSzlwQjdlNU9GdWt2OHdFSGh6bHhSdz09IiwibWFjIjoiM2I1MzEzODA5NGNmYTJjYjM4MGVhNmEwODlkNWMyOWE5MjYxNzM3OTA0NDMwMTk5ODM4NzM1YjBjMzM3ZTYzNyJ9', 'eyJpdiI6InBicGNwbzRkUFlabk1qRVhnYm8xUFE9PSIsInZhbHVlIjoiNWFvUGp3MmVqSFdQcWMwSHY2Vm9MV1ZoWGMzZ0JJZ0VYV3Y3a2RGaDhmTDFzUzh1alwvNXBiQXNiemxoSmt5Rm0iLCJtYWMiOiJmNzNhYjQyNWFlNjcwYzJmYmRlZTRhZTRmOGVjMjE5YzA3ODgyMDAzYmU2ZTY4M2JiNGIwZTJkZWM0NmQ3OWNiIn0=', 'eyJpdiI6Ik1hRVlvMWsybmRDQWtOZHhzXC90SHpnPT0iLCJ2YWx1ZSI6ImJBNEJKeXFJbVlCSDJ3bmxia3JyVkE9PSIsIm1hYyI6IjYwYzMzMWEyMmI3OWJmMWFlY2QyYzZhNTkzMDllNzlkMWVkZGIwMjU5OGMzZjgwYTY5YWY4N2FmMjE0MjMxNGYifQ==', '2018-04-23 16:11:07', '2018-04-23 16:11:07'),
(24, 'eyJpdiI6Im5JZHd3UWljbkRpbEhhZWtaSlVvQ3c9PSIsInZhbHVlIjoiZUx3bVlJZDZrelo5U3dUc1RLS09RS0pNeGxwY01JdzJVSGRSNXkraTdlTT0iLCJtYWMiOiI3MjFkNDlhMWEwMWUwZmU5ZDlhNjI1MTJkNTBhMjliOWFhZDZmNTgwZjQ2NWEwMWM3MDBlOWIwZmY2YTE0N2Y3In0=', 'eyJpdiI6InJGaGFxb0RYc0hvMGFHMzRMdkNHY2c9PSIsInZhbHVlIjoid0prdmMxUG1Rc0ZZYWJRQTF1YXkxUT09IiwibWFjIjoiMjQ5MGQyMGZlYjc2YTk1NDA3Y2UzOGE0ZmE2NjBmN2E1NjAxOTI5NjliOGQ2YWRjYjQ1NGRjYjQ5NTZiY2ExMyJ9', 'eyJpdiI6IlhEM2ZEenJyYzBHSjFDTXRzWG9aNEE9PSIsInZhbHVlIjoiOGhUZVNsUGJoc2k2ODIybkxwUlVmdUZQeGU0SnVXa3J6VWI3M1I1VWc1MWVYR2JHdVZzTUl4aERzekZhUzQ2TCIsIm1hYyI6IjgyMWVhMzJjMGNiZjQ2YzIyODNkZWFlNjA3MzgxNDQwMTUzM2NiYzcyYzliOWE5YWZhYmE4ZjU5N2JlYTc5NmQifQ==', 'eyJpdiI6Imh5eENyRytGUWVZNVNhRnNDcFhNcUE9PSIsInZhbHVlIjoiUkY0SndISnBqTW9BTEVQR3NsYzdzYmllekw1WTVzXC8rdVBDUDNRa3NjMTRmWDZEdzhGS1FoenRTUzYxYnRiSnMiLCJtYWMiOiJkMzY0YjRlYWFmY2YyZDAwNDk0Yjk4ZmZlZGEzYzNjMzEyZmNkYjg0ZThjOTBiYzFjODIxM2MyMGM2ODIwZTU3In0=', '2018-04-23 19:17:37', '2018-04-23 19:17:37'),
(25, 'eyJpdiI6IjJqYWhzelVtT0JybjFlWHp0N1o4RlE9PSIsInZhbHVlIjoiTzY5NUdtKzV4aHk2VFVWU0FUYVE1a3RLUWdHZzJDa2w2SkVEUDExenhjOD0iLCJtYWMiOiI0YjRhMjJiODgyMmU4MzZkZDhhYTU0NjRlMjdjMzM1NzNiY2NhZTgxNjc5ODA0MGNjM2RlZWMxNjc4ODc5NWYxIn0=', 'eyJpdiI6IlBEZ2g4WlNMbCtvQmxkd0l6S1ZMY2c9PSIsInZhbHVlIjoiSGNoVVJNeE9VNzZPT3BVbjVvakJaZz09IiwibWFjIjoiNGQ1ODA1OTQ0ZjNkZDUzZDMzOGUxNWM4Y2IzOTEzODU0NTE0ZTZhMzM5NjE2MGRlZTUxMTY0OTdjMzE1YjhlZSJ9', 'eyJpdiI6InY2VGhcL2VFWjZMT3dEWFExaldSS2RnPT0iLCJ2YWx1ZSI6Ims5eUJuUTNnOGZicDhjWGZTenFZekM0SHdcL0ZIYjBlV2hzbVlGd0NrSDBBa3hTTWVSUDFFS3gxaXVEYks1eElvIiwibWFjIjoiZDliNDViMzNhOGEzNTQxMjk3NjUyODMwMTc5YTJiYzBhOTNlZjg0NTM1ODQ3ZGEwNWRlMzkxODhlY2Y1N2RhZSJ9', 'eyJpdiI6IkNEQVR2d1NHaFpFSytVSGZuclJBakE9PSIsInZhbHVlIjoiTjM0NXBBUG93V1puWTZyekZ3bjRuZHNEOTQwZ09YbzdpczU5QVwvZ0tBSTQ9IiwibWFjIjoiOGI2ZTJmYzZhNDA2ZmViOWI2YjhmM2I0NTNmNjkwMWY2YzU5MGRkYzNkMWFlZTcyMTFjYTFiY2JlNzUxMTZlNSJ9', '2018-04-23 19:20:25', '2018-04-23 19:20:25'),
(26, 'eyJpdiI6ImRTY2x1ZUs4bWFGczArdm1HWGJUY0E9PSIsInZhbHVlIjoiWTh1eEZveVoxQStReVFVRkhCNTc3cnlhWkFLazh1cUhhYWpHakUyU3VYZz0iLCJtYWMiOiIxZDg5NjliZDg2ZWRjNDE2YjVmOTVhNTdjZmM0MDVkNjMxZjIwZTdkYmQzN2FlOTc3M2M5MzA4ODhhMTk3N2Y0In0=', 'eyJpdiI6IlI0UGozR0xXdGt0TW50dDZtTlBiOEE9PSIsInZhbHVlIjoicTRcL21VOFdVUUlDVmhFV1JcLzc4YlVBPT0iLCJtYWMiOiI3NTRhMGMzYjY5ODJmNGUyMzFkOThlNGM3ZmU5ZGM1MTY4YjJjNzE0ZTE1ZDgwMTJjYTIxZDRlZTY0NTIyNDM4In0=', 'eyJpdiI6InNxdzl2Y0JQWGZoZW9VNk42KzI5enc9PSIsInZhbHVlIjoiQVpDbFVTNTFpSDNqVCsyZlBjeGR4eUo5VGxVc0R6WmFxdEdKNlBmUkRwZz0iLCJtYWMiOiIyMzBjNzE1MDNkYjIxN2QyY2RkNWIyYzY3M2M0ZDdhZWE0MTE2ZGQ2ZjI5YjU3MzRiM2Y2OWYxOGYwN2U4ZmU5In0=', 'eyJpdiI6InQySitIUkk1bGc5dTh4c014NEVpWlE9PSIsInZhbHVlIjoidjh2VGFMb3U0XC84OTZXRHQ2ZzVKQXJoN2JoQTNZc3BzWFdnSU1MWGtDY0hFbTg3WWJtUE9UWUd3RXNxXC9NbjBOIiwibWFjIjoiMTAxZGU1OWQzOWFiN2VkY2UwOTRhMTE1ZjQ3OGQ5YWEzZGMyMDc4MGM4ZTc0OTI0NTAyOTNiM2M5OTQ0NDhjMiJ9', '2018-04-23 19:39:54', '2018-04-23 19:39:54'),
(27, 'eyJpdiI6ImdpNmM3d0lpWktOeGJiRUR0dnl3XC9RPT0iLCJ2YWx1ZSI6IlpudTA2YWZVZWRGNWJkY252R0NyaFhGK1QyVWlmNGZ6RDNqSkRxSjYyaEU9IiwibWFjIjoiMmU4NTg3ZWU3MjRhODU2MTkzN2Q0ZjE3OWU0ZGNlZjg5MzIzOGFlNzlmNDEyODNkZTk1MDljMzVhNjIxZDVhNSJ9', 'eyJpdiI6Ik9HRUZwbFV2TjhJRjFJU3UxQlwvRTFnPT0iLCJ2YWx1ZSI6IjBWXC95THdLMjcrQ1NnNHlabDRIMDR3PT0iLCJtYWMiOiJkNDYxZjgxMjAzMDNjY2UwNDI0ODU4NGJhMDAxY2U5MWYxMzJlNzgyNDZmNmM4MmIwZThkYmQ4ZWJlZTA5Mzg0In0=', 'eyJpdiI6IkJTenVZb3F1VXQ4a3gwY0pXdlhMVXc9PSIsInZhbHVlIjoieEpVbnBMRmx2SUtnVEpcL3NmN1NvSmR2V0l1NWtKXC9LS3k5WE9hXC9RNHJVRlwvUU1XTXNTRlwvUCt6YWl4NVgyNkpxIiwibWFjIjoiMjVkNmRhYjUxN2I3NjlmNzljMTEzZTIxNjkwZmYzOThhOTYyNDkzNDY0NzNlZWI0ZDAzYWU5MGJlZjliNjdkNyJ9', 'eyJpdiI6Ik43bWhpeFZLWnh4aUhHaGNNM0Q4UFE9PSIsInZhbHVlIjoiMzZzVkNsV1wvcU00VG1pTlBVOEZsWXc9PSIsIm1hYyI6Ijc3NGYxNGYwYzY5MzNhOWYzNjI0MDFkZDllZjI1N2NkZGFmMjM5ZmMyMWNhMzY4ZDU3YThlYmYwMTYwNmRlYTIifQ==', '2018-04-23 20:01:15', '2018-04-23 20:01:15'),
(28, 'eyJpdiI6IllmbXNCY2FacUhxR3ZLNUF6TjdIZkE9PSIsInZhbHVlIjoiV2NCUEI3UDZXZEdsb2x3eDhjcEZXbDdNVWl6SGZPUngzUkJMS1hZTnhVYz0iLCJtYWMiOiJkMWYwZmIwNjU3ZDIyMjJkOGYzZDA5Y2MxNTc3YjBjOGE3NjM5NGFiOWE0YWI0OTM2YjdkMGQyMWRiZjQ5N2NjIn0=', 'eyJpdiI6ImM4OGNHdWxLYVRFRFZFNG9DbldTYlE9PSIsInZhbHVlIjoidkFwR1BEUTB6bGVCQkduMEp1T0xzZz09IiwibWFjIjoiMGFhZTM3OTkyZGMzNWYxY2M1MGI0MmIxY2Q1ZTIxYjY3ZTQzNmVjNGM4N2ZjMWMyYjI5YTdiOGExNGQ2NmEzYiJ9', 'eyJpdiI6IklFR3YxVWpRZ1dob1RZTW52MEp1XC9RPT0iLCJ2YWx1ZSI6ImhxYkZ2aWxqdDBXOG9YcXV4eklZeTIrdzBUSnJHT2JxdllaS2Y2aEdTYUZkQ08zYWR5cXBCN2ZXazRkeUMrcGkiLCJtYWMiOiI1NDdlYTQ5MGNhNjE5OGRjNmJjODZmOGY3MTJkMThlYTVlZDgzNTBmZTBkNGNhMDhmMWMyMzllMDBkMDA5ZGZjIn0=', 'eyJpdiI6Ikw2bFI0RzBXZWI3SjcwdjZFWWcwUHc9PSIsInZhbHVlIjoidUdvNTVJSkVlWEl0clFmVjZuOXJOUT09IiwibWFjIjoiMTg3MjkxNmQ0N2NkNDUwMjliNDdhZWQ1Mzg3ZWI2NTllZjRiNmQ0MzUzYjgyODUwNzA4YjFhNzlkOTk3NGQxYSJ9', '2018-04-23 20:55:49', '2018-04-23 20:55:49'),
(29, 'eyJpdiI6IkdkVGZ5TURmcm5GTFlOazFQS1hLckE9PSIsInZhbHVlIjoiSVZZXC8zQzN6aUtIV2ViY3JSV3hXOXlSTm5vTE5RUVBETWZcL0xHY3RcL09mOD0iLCJtYWMiOiJiM2JlMWUwMjM1Y2VmNTE5Y2Y1YzAxM2Y4NmE3YjhiOTk3MWE0NjZiYWM0MmYzOTVjNjdjMWE5NmRkZDJmNzI3In0=', 'eyJpdiI6Imh0YmVESFVWdEZQUlZxRXFBc1FQR2c9PSIsInZhbHVlIjoibHQyUUxcL29LWG5jMTUxR3B0dzNRcFE9PSIsIm1hYyI6ImEyZDE2NmY2Y2VhOTFlZWQyNzVlMWUwZWJmMmU0NDM1Yjg3NjY3NDcwNDhjOTBmNzlmOWNmNjdjYmU0MWZiZDgifQ==', 'eyJpdiI6IlBTRHYxQ1RRb1NLZkxrdmtFNnd0UWc9PSIsInZhbHVlIjoiNUp1ditBR2daUmxXMmxmWE9MQ1wvQ0NiYWlHV2VzOGN0K3BsRkVzNFJ5M1RhNUZ0WThkd1crN2ZGZWw2RFwveFdpIiwibWFjIjoiYzFiZWY5ZDEwYzJlNTNjOGM5NmViMDkwNjlkZTlkNmE3MTk2ZTZmZmUxZDM4NDQ3NThjMjc3NTNjODZjZTBmZiJ9', 'eyJpdiI6IlwvZzZ1Tld5MENUMjBvNlVUVlJEQ3h3PT0iLCJ2YWx1ZSI6IjFsOXg3aTIxNzN5OVpOeit1NjVwVlE9PSIsIm1hYyI6ImExNDUzNmM0OGEyN2I2ZWFmNTNkMGM1MGZiNGEwOWNjNmQ0ODlhOTc1OTE0YmJlMGE0NzRiMGQ5MDVmNDNkZWYifQ==', '2018-04-23 20:55:49', '2018-04-23 20:55:49');

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
