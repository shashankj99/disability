<?php

define('LARAVEL_START', microtime(true));

require __DIR__.'/disability/vendor/autoload.php';

$app = require_once __DIR__.'/disability/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
