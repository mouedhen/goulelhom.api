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

class ThemesStatsController extends StatsAbstractController
{
    public function __invoke(Request $request)
    {
        $records = $this->prepare($request);
        $stat = $records
            ->select(DB::raw('theme_translations.name as theme, themes.color as color, COUNT(*) as count'))
            ->join('themes', 'themes.id', '=', 'theme_id')
            ->join('theme_translations', 'theme_translations.theme_id', '=', 'complains.theme_id')
            ->where('locale', '=', App::getLocale())
            ->groupBy(['theme', 'color'])
            ->get();

        return response()->json($stat);
    }
}