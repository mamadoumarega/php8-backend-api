<?php

namespace Mamadou\Php8BackendApi;

class AllowCors
{
    private const ALLOW_CORS_ORIGIN_KEY = 'Access-Control-Allow-Origin';
    private const ALLOW_CORS_METHOD_KEY = 'Access-Control-Allow-Methods';
    private const ALLOW_CORS_ORIGIN_VALUE = '*';
    private const ALLOW_CORS_ORIGIN_KEY_VALUE = 'GET, POST, PUT, DELETE, PATCH, OPTIONS';

    /**
     * Initialise the Cross-Origin Resource Sharing (CORS) headers.
     * @return void
     */
    public function init(): void
    {
        $this->set($this::ALLOW_CORS_ORIGIN_KEY, $this::ALLOW_CORS_ORIGIN_VALUE);
        $this->set($this::ALLOW_CORS_METHOD_KEY, $this::ALLOW_CORS_ORIGIN_KEY_VALUE);
    }

    private function set(string $key, string $value): void
    {
        header($key . ':' . $value);
    }
}