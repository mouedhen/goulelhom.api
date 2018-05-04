<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 04/05/18
 * Time: 03:54
 */

namespace App\Http\Controllers\API\Stats;


use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class StatsAbstractController extends Controller
{
    protected function prepare(Request $request)
    {
        if ($request->query('start_date') && $request->query('start_date') !== null) {

            $start_date = new Carbon($request->query('start_date'));
            $end_date = new Carbon($request->query('end_date'));

            if ($start_date->equalTo($end_date)) {
                $records = DB::table('complains')
                    ->whereDate('complains.created_at', '=', $start_date->toDateString());
            } else {
                $records = DB::table('complains')
                    ->whereBetween('complains.created_at',
                        [
                            (new Carbon($start_date))->toDateString(),
                            (new Carbon($end_date))->toDateString(),
                        ]);
            }
        } else {
            $records = DB::table('complains');
        }
        if ($request->query('municipalities')) {
            $municipalities = explode(',', $request->query('municipalities'));
            $records = $records->whereIn('complains.municipality_id', $municipalities);
        }
        if ($request->query('themes')) {
            $themes = explode(',', $request->query('themes'));
            $records = $records->whereIn('complains.theme_id', $themes);
        }
        return $records;
    }
}