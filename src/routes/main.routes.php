<?php

namespace Mamadou\Php8BackendApi;

use PH7\JustHttp\StatusCode;
use PH7\PhpHttpResponseHeader\Http;

$getResponse =  fn(): string => json_encode(['error' => 'Request not found']);

Http::setHeadersByCode(StatusCode::NOT_FOUND);
echo $getResponse();