<?php
   namespace Mamadou\Php8BackendApi;

   use Whoops\Handler\JsonResponseHandler;
   use Whoops\Run;

   require __DIR__ . '/vendor/autoload.php';

   $whoops = new Run();
   $whoops->pushHandler(new JsonResponseHandler);
   $whoops->register();
   
   require __DIR__ . '/src/routes/routes.php';
   require __DIR__ . '/src/config/config.inc.php';
   require __DIR__ . '/src/config/database.inc.php';
   require __DIR__ . '/src/helpers/headers.inc.php';