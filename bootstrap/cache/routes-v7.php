<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/adminlte/darkmode/toggle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminlte.darkmode.toggle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/post-login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'post-login',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/dsm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dsm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-dsm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.dsm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-dsm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.dsm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/datatable-dsm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'datatable.dsm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kpi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'kpi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-kpi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.kpi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-kpi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.kpi',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'monitoring',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.monitoring',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.monitoring',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/po' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'po',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-po' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.po',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-po' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.po',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/datatable-po' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'datatable.po',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sppm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sppm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-sppm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.sppm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-sppm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.sppm',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/datatable-sppm' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'datatable.sppm',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/pembinaan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pembinaan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/create-pembinaan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'create.pembinaan',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/store-pembinaan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'store.pembinaan',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/edit\\-(?|dsm/([^/]++)(*:29)|kpi/([^/]++)(*:48)|monitoring/([^/]++)(*:74)|p(?|o/([^/]++)(*:95)|embinaan/([^/]++)(*:119))|sppm/([^/]++)(*:141))|/update\\-(?|dsm/([^/]++)(*:174)|kpi/([^/]++)(*:194)|monitoring/([^/]++)(*:221)|p(?|o/([^/]++)(*:243)|embinaan/([^/]++)(*:268))|sppm/([^/]++)(*:290))|/delete\\-(?|dsm/([^/]++)(*:323)|kpi/([^/]++)(*:343)|monitoring/([^/]++)(*:370)|p(?|o/([^/]++)(*:392)|embinaan/([^/]++)(*:417))|sppm/([^/]++)(*:439)))/?$}sDu',
    ),
    3 => 
    array (
      29 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.dsm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      48 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.kpi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      74 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.monitoring',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      95 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.po',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      119 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.pembinaan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      141 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'edit.sppm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.dsm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      194 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.kpi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      221 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.monitoring',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.po',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      268 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.pembinaan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'update.sppm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.dsm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      343 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.kpi',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      370 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.monitoring',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      392 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.po',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      417 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.pembinaan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      439 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'delete.sppm',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'adminlte.darkmode.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'adminlte/darkmode/toggle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'JeroenNoten\\LaravelAdminLte\\Http\\Controllers\\DarkModeController@toggle',
        'controller' => 'JeroenNoten\\LaravelAdminLte\\Http\\Controllers\\DarkModeController@toggle',
        'as' => 'adminlte.darkmode.toggle',
        'namespace' => NULL,
        'prefix' => 'adminlte',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\AuthController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'post-login' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'post-login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@postLogin',
        'controller' => 'App\\Http\\Controllers\\AuthController@postLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'post-login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'dsm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'dsm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@getDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@getDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-dsm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@createDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@createDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-dsm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@storeDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@storeDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-dsm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@editDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@editDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-dsm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@updateDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@updateDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete-dsm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@deleteDsm',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@deleteDsm',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'datatable.dsm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'datatable-dsm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DSM\\DSMController@datatables',
        'controller' => 'App\\Http\\Controllers\\DSM\\DSMController@datatables',
        'namespace' => 'App\\Http\\Controllers\\DSM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'datatable.dsm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'kpi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kpi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@getKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@getKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.kpi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-kpi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@createKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@createKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.kpi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-kpi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@storeKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@storeKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.kpi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-kpi/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@editKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@editKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.kpi' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'update-kpi/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@updateKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@updateKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.kpi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'delete-kpi/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\KPI\\KPIController@deleteKpi',
        'controller' => 'App\\Http\\Controllers\\KPI\\KPIController@deleteKpi',
        'namespace' => 'App\\Http\\Controllers\\KPI',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.kpi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@getMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@getMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@createMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@createMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@storeMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@storeMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-monitoring/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@editMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@editMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'update-monitoring/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@updateMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@updateMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'delete-monitoring/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@deleteMonitoring',
        'controller' => 'App\\Http\\Controllers\\Monitoring\\MonitoringController@deleteMonitoring',
        'namespace' => 'App\\Http\\Controllers\\Monitoring',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.monitoring',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'po' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'po',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@getPo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@getPo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.po' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-po',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@createPo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@createPo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.po' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-po',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@storePo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@storePo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.po' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-po/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@editPo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@editPo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.po' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'update-po/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@updatePo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@updatePo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.po' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'delete-po/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@deletePo',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@deletePo',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'datatable.po' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'datatable-po',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PO\\POController@datatables',
        'controller' => 'App\\Http\\Controllers\\PO\\POController@datatables',
        'namespace' => 'App\\Http\\Controllers\\PO',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'datatable.po',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'sppm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sppm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@getSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@getSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-sppm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@createSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@createSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-sppm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@storeSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@storeSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-sppm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@editSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@editSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'update-sppm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@updateSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@updateSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'delete-sppm/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@deleteSppm',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@deleteSppm',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'datatable.sppm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'datatable-sppm',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SPPM\\SPPMController@datatables',
        'controller' => 'App\\Http\\Controllers\\SPPM\\SPPMController@datatables',
        'namespace' => 'App\\Http\\Controllers\\SPPM',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'datatable.sppm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pembinaan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@getPembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@getPembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'create.pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'create-pembinaan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@createPembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@createPembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'create.pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'store.pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'store-pembinaan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@storePembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@storePembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'store.pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'edit.pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'edit-pembinaan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@editPembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@editPembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'edit.pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'update.pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'update-pembinaan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@updatePembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@updatePembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'update.pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
    'delete.pembinaan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'delete-pembinaan/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@deletePembinaan',
        'controller' => 'App\\Http\\Controllers\\Pembinaan\\PembinaanController@deletePembinaan',
        'namespace' => 'App\\Http\\Controllers\\Pembinaan',
        'prefix' => NULL,
        'where' => 
        array (
        ),
        'as' => 'delete.pembinaan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
    ),
  ),
)
);
