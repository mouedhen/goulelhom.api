<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('API_VERSION'), 'namespace' => 'API'], function () {

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

            // Route::apiResources([
            //     'activities' => 'UserAvatarController',
            // ], [
            //     'except' => ['index', 'create', 'show', 'edit', 'update']
            // ]);

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

        Route::apiResources([
            'presentation-video' => 'PresentationVideoController',
        ], [
            'except' => ['create', 'edit',]
        ]);

    });

});


