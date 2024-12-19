<?php



$app = new \Learning\Application(dirname(__DIR__));

$app->singleton(WPWhales\Contracts\Debug\ExceptionHandler::class, \Learning\Exceptions\Handler::class);
$app->singleton(\WPWhales\Contracts\Console\Kernel::class,\Learning\Console\Kernel::class);

/**
 * Config Files
 */

$app->configure("assets");
$app->configure("filesystems");


/**
 * some features initializations
 */
$app->withEloquent();
$app->withFacades();
$app->withActionScheduler();

/**
 * Global Middlewares
 */
$app->middleware(\Learning\Http\Middlewares\VerifyCsrfToken::class);

/**
 * Middlewares
 */
$app->routeMiddleware(["auth"=> \Learning\Http\Middlewares\Authenticate::class,
                       "signed"=>\WPWCore\Routing\Middleware\ValidateSignature::class]);


$app->register(\Learning\Providers\BindingServiceProvider::class);
$app->register(\Learning\Providers\HooksServiceProvider::class);
$app->register(\Learning\Providers\EventsServiceProvider::class);

$app->singleton(\WPWCore\Models\User::class,function(){
    return new \Learning\Models\User();
});

$app->createWebRoutesFromFile(dirname(__DIR__)."/routes/web.php",["namespace"=>"\Learning\Http\Controllers"]);
$app->createAjaxRoutesFromFile(dirname(__DIR__)."/routes/ajax.php",["namespace"=>"\Learning\Http\Controllers\API"]);
$app->createWordpressRoutesFromFile(dirname(__DIR__)."/routes/wordpress.php",["namespace"=>"\Learning\Http\Controllers\Wordpress"]);


return $app;