<?php

namespace Mamadou\Php8BackendApi\Validation;

use Respect\Validation\ChainedValidator;
use Respect\Validation\Validator as v;

class UserValidation
{
    const MINILENGTH = 2;
    const MAXIMUMLENGTH = 60;

    public function __construct(private mixed $data){}

    /**
     * @return bool
     */
    public function isCreationSchemaValid(): bool
    {
        $schemaValidation = v::attribute('email', v::email(), mandatory: false)
            ->attribute('firstname', v::stringType()->length(self::MINILENGTH, self::MAXIMUMLENGTH))
            ->attribute('surname', v::stringType()->length(self::MINILENGTH, self::MAXIMUMLENGTH))
            ->attribute('phoneNumber', v::phone(), mandatory: false)
        ;

        return $schemaValidation->validate($this->data);
    }

    /**
     * @return bool
     */
    public function isUpdateSchemaValid(): bool
    {
        return $this->isCreationSchemaValid($this->data);
    }
}