<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => config('api.version'),
    'namespace' => 'API'
], function () {

    /*
     * public routes
     */
    Route::group([
        'namespace' => 'Publics',
        'prefix' => 'public',
    ], function () {

        Route::apiResources([
            'contacts' => 'ContactController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'index']
        ]);

        Route::apiResources([
            'complains' => 'ComplainController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'update']
        ]);

        Route::post('complains/{id}/upload', 'ComplainAttachmentController@store')
            ->where('id', '[0-9]+');

        Route::apiResources([
            'municipalities' => 'MunicipalityController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'update']
        ]);

        Route::apiResources([
            'themes' => 'ThemeController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'update']
        ]);

        Route::apiResources([
            'events' => 'EventController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'update', 'store']
        ]);

        Route::apiResources([
            'reports' => 'ReportController',
        ], [
            'except' => ['create', 'edit', 'destroy', 'update', 'store']
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

            Route::apiResources([
                'themes' => 'ThemeController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('themes/{id}/upload', 'ThemeAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('themes/{recordID}/doc/{mediaID}', 'ThemeAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

            Route::apiResources([
                'keywords' => 'KeywordsController',
            ], [
                'except' => ['create', 'edit',]
            ]);
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
                'events' => 'EventController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('events/{id}/media', 'EventMediaController@store')
                ->where('id', '[0-9]+');

            Route::delete('events/{eventID}/media/{mediaID}', 'EventMediaController@destroy')
                ->where('eventID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

            Route::apiResources([
                'presses' => 'PressController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('presses/{id}/upload', 'PressAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('presses/{recordID}/doc/{mediaID}', 'PressAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

        });
    });

    Route::group([
        'namespace' => 'Contacts',
        'prefix' => 'contacts',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'contacts' => 'ContactController',
            ], [
                'except' => ['create', 'edit',]
            ]);

        });
    });

    Route::group([
        'namespace' => 'Locations',
        'prefix' => 'locations',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'countries' => 'CountryController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('countries/{id}/upload', 'CountryAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('countries/{recordID}/doc/{mediaID}', 'CountryAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

            Route::apiResources([
                'cities' => 'CityController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('cities/{id}/upload', 'CityAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('cities/{recordID}/doc/{mediaID}', 'CityAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

            Route::apiResources([
                'municipalities' => 'MunicipalityController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('municipalities/{id}/upload', 'MunicipalityAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('municipalities/{recordID}/doc/{mediaID}', 'MunicipalityAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

        });
    });

    Route::group([
        'namespace' => 'Complains',
        'prefix' => 'complains',
    ], function () {
        Route::group([
            'middleware' => 'auth:api',
        ], function () {

            Route::apiResources([
                'complains' => 'ComplainController',
            ], [
                'except' => ['create', 'edit',]
            ]);

            Route::post('complains/{id}/upload', 'ComplainAttachmentController@store')
                ->where('id', '[0-9]+');

            Route::delete('complains/{recordID}/doc/{mediaID}', 'ComplainAttachmentController@destroy')
                ->where('recordID', '[0-9]+')
                ->where('mediaID', '[0-9]+');

        });
    });

});


