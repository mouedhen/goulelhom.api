<?php

namespace App\Http\Controllers\API\Analytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class VisitorsAnalyticsController extends Controller
{
    public function visitorsPagesView(Request $request)
    {
        $this->validate($request, [
            'period' => 'nullable|integer|min:1',
        ]);

        $period = 7;

        if ($request->query('period')) {
            $period = $request->query('period') - 1;
        }

        $data = Analytics::fetchTotalVisitorsAndPageViews(Period::days($period));
        return response()->json([
            'data' =>$data
        ]);
    }

    public function topPages(Request $request) {
        $this->validate($request, [
            'period' => 'nullable|integer|min:1',
        ]);

        $period = 7;

        if ($request->query('period')) {
            $period = $request->query('period') - 1;
        }

        $data = Analytics::fetchMostVisitedPages(Period::days($period));
        return response()->json([
            'data' =>$data
        ]);
    }

    public function usersTypes(Request $request) {
        $this->validate($request, [
            'period' => 'nullable|integer|min:1',
        ]);

        $period = 7;

        if ($request->query('period')) {
            $period = $request->query('period') - 1;
        }

        $data = Analytics::fetchUserTypes(Period::days($period));
        return response()->json([
            'data' =>$data
        ]);
    }

    public function topCountry(Request $request)
    {
        $this->validate($request, [
            'period' => 'nullable|integer|min:1',
        ]);

        $period = 7;

        if ($request->query('period')) {
            $period = $request->query('period') - 1;
        }

        $gaResponse = Analytics::performQuery(
            Period::days($period),
            'ga:sessions',
            [
                'dimensions' => 'ga:country',
                'sort' => '-ga:sessions',
            ]
        );
        $data = collect($gaResponse['rows'] ?? [])->map(function (array $browserRow) {
            return [
                'country' => $browserRow[0],
                'sessions' => (int) $browserRow[1],
            ];
        });

        return response()->json([
            'data' =>$data
        ]);
    }
}