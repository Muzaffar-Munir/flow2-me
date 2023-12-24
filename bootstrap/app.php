<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: *');
// header('Access-Control-Allow-Headers: *');
$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/
$autoload = require __DIR__ . '/../vendor/autoload.php';

// register all `autoload-dev` paths from React's components
foreach (glob(__DIR__ . '/../vendor/react/*/composer.json') as $b) {
    $config = json_decode(file_get_contents($b), true);

    if (isset($config['autoload-dev']['psr-4'])) {
        $base = dirname($b) . '/';
        foreach ($config['autoload-dev']['psr-4'] as $namespace => $paths) {
            foreach ((array)$paths as $path) {
                $autoload->addPsr4($namespace, $base . $path);
            }
        }
    }
}

// load all legacy test bootstrap scripts from React's components
foreach (glob(__DIR__ . '/../vendor/react/*/tests/bootstrap.php') as $b) {
    // skip legacy react/promise for now and use manual autoload path from bootstrap config
    // @link https://github.com/reactphp/promise/blob/1.x/tests/bootstrap.php
    // @link https://github.com/reactphp/promise/blob/2.x/tests/bootstrap.php
    if (strpos($b, 'react/promise/tests/bootstrap.php') !== false) {
        $autoload->add('React\Promise', __DIR__ . '/../vendor/react/promise/tests');
        $autoload->addPsr4('React\\Promise\\', __DIR__ . '/../vendor/react/promise/tests');
        continue;
    }

    include $b;

}

return $app;
