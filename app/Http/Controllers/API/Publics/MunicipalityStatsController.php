<?php

namespace App\Http\Controllers\API\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MunicipalityStatsController extends Controller
{
    public function __invoke($id)
    {
        $stat = DB::table('theme_translations')
            ->select(DB::raw('theme_translations.theme_id AS id, theme_translations.name as theme, municipality_id, color, COUNT(*) as count'))
            ->join('themes', 'themes.id', '=', 'theme_translations.theme_id')
            ->join('complains', 'complains.theme_id', '=', 'theme_translations.theme_id')
            ->where('locale', '=', App::getLocale())
            ->where('municipality_id', '=', $id)
            ->groupBy(['theme', 'id', 'color', 'municipality_id'])
            ->get();

        return response()->json($stat);
    }
}
