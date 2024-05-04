<?php

namespace Mamadou\Php8BackendApi;

use PH7\PhpHttpResponseHeader\Http;

(new AllowCors())->init();
Http::setContentType('application/json');