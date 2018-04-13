<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('api.version'),
    'namespace' => 'API'
], function () {

    Route::get('test', function () {
        return response()->json([
            'hello',
            config('api')
        ]);
    });

    /*
     * Authentication package routes
     */
    Route::group([
        'namespace' => 'Auth',
        'prefix' => 'auth',
    ], function () {
        Route::get('login', 'AccessController@loginIndex')
            ->name('login');
        Route::get('logout', 'AccessController@logoutIndex')
            ->name('logout');
        Route::post('login', 'AccessController@login')
            ->name('auth.login');

        Route::group([
            'middleware' => 'auth:api',
        ], function () {
            Route::get('profile', 'AccessController@profile')
                ->name('auth.profile');
            Route::post('logout', 'AccessController@logout')
                ->name('auth.logout');
        });
    });

    /*
     * Users package routes
     */
    Route::group([
        'namespace' => 'Users',
        'prefix' => 'users',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {
            Route::apiResources([
                'users' => 'UserController',
            ], [
                'except' => ['create', 'edit',]
            ]);
            Route::apiResources([
                'activities' => 'ActivityController',
                'roles' => 'RoleController',
                'permissions' => 'PermissionController',
            ], [
                'except' => ['create', 'store', 'edit', 'update', 'destroy']
            ]);
        });
    });

    /*
     * Analytics package routes
     */
    Route::group([
        'namespace' => 'Analytics',
        'prefix' => 'analytics',
    ], function () {

        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::get('visitors', 'VisitorsAnalyticsController@visitorsPagesView')
                ->name('analytics.visitors');

            Route::get('top-pages', 'VisitorsAnalyticsController@topPages')
                ->name('analytics.top-pages');

            Route::get('users-types', 'VisitorsAnalyticsController@usersTypes')
                ->name('analytics.users-types');
        });

    });

    Route::group([
        'namespace' => 'Base',
        'prefix' => 'content',
    ], function () {

        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'presentation-video' => 'PresentationVideoController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::apiResources([
                'sliders' => 'SliderController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('sliders/{id}/img', 'SliderImgController@store')
                ->where('id', '[0-9]+');

            Route::delete('sliders/{sliderID}/doc/{mediaID}', 'SliderImgController@destroy')
                ->where('reportID', '[0-9]+')
                ->where('mediaID', '[0-9]+');
        });

    });

    Route::group([
        'namespace' => 'Metrics',
        'prefix' => 'metrics',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'reports' => 'ReportController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('reports/{id}/doc', 'ReportDocController@store')
                ->where('id', '[0-9]+');

            Route::delete('reports/{reportID}/doc/{mediaID}', 'ReportDocController@destroy')
                ->where('reportID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

        });
    });

    Route::group([
        'namespace' => 'Posts',
        'prefix' => 'posts',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'reports' => 'EventController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('reports/{id}/media', 'EventMediaController@store')
                ->where('id', '[0-9]+');

            Route::delete('reports/{reportID}/media/{mediaID}', 'EventMediaController@destroy')
                ->where('reportID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

        });
    });

});


