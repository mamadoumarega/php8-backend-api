<?php

namespace Mamadou\Php8BackendApi;

use Mamadou\Php8BackendApi\endpoints\Exception\InvalidValidationException;
use Respect\Validation\Validator as v;
class User
{
    public readonly int $userId;
    public function __construct(
        public readonly string $email,
        public readonly string $firstname,
        public readonly string $surname,
        public readonly string $phoneNumber
    ){
    }

    /**
     * @param mixed $data
     * @return object
     */
    public function create(mixed $data): object
    {
        $minimumLength = 2;
        $maximumLength = 60;

        $schemaValidate = v::attribute('email', v::email(), mandatory: false)
            ->attribute('firstname', v::stringType()->length($minimumLength, $maximumLength))
            ->attribute('surname', v::stringType()->length($minimumLength, $maximumLength))
            ->attribute('phoneNumber', v::phone(), mandatory: false)
        ;

        if ($schemaValidate->validate($data)) {
            return $data;
        }

        throw new InvalidValidationException();

        return $this;
    }

    public function retrieve(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return array
     */
    public function retrieveAll(): array
    {
        return [];
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function update(mixed $data): self
    {
        return $this;
    }

    public function remove(): self
    {
        return $this;
    }

}