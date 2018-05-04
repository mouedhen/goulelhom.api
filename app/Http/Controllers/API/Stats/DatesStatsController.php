<?php
/**
 * Created by PhpStorm.
 * User: mouedhen
 * Date: 04/05/18
 * Time: 03:57
 */

namespace App\Http\Controllers\API\Stats;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DatesStatsController extends StatsAbstractController
{
    public function __invoke(Request $request)
    {
        $records = $this->prepare($request);
        $stat = $records
            ->select(DB::raw('date(created_at) as dates, COUNT(*) as count'))
            ->groupBy(['dates'])
            ->get();

        return response()->json($stat);
    }
}