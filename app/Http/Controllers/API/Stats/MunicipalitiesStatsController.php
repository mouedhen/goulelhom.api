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

class MunicipalitiesStatsController extends StatsAbstractController
{
    public function __invoke(Request $request)
    {
        $records = $this->prepare($request);
        $stat = $records
            ->select(DB::raw('municipality_translations.name as municipality, COUNT(*) as count'))
            ->join('municipalities', 'municipalities.id', '=', 'municipality_id')
            ->join('municipality_translations', 'municipality_translations.municipality_id', '=', 'complains.municipality_id')
            ->where('locale', '=', App::getLocale())
            ->groupBy(['municipality'])
            ->get();

        return response()->json($stat);
    }
}