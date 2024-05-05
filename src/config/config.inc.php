<?php
    namespace Mamadou\Php8BackendApi;

    use Dotenv\Dotenv;

    $path = dirname(__DIR__, 2);
    $dotenv = Dotenv::createMutable($path);
    $dotenv->load();

    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);