<?php

namespace Mamadou\Php8BackendApi;

use Mamadou\Php8BackendApi\Exception\InvalidValidationException;
use Respect\Validation\Validator as v;

class User
{
    public readonly int $userId;
    const MINILENGTH = 2;
    const MAXIMUMLENGTH = 60;

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
        $schemaValidate = v::attribute('email', v::email(), mandatory: false)
            ->attribute('firstname', v::stringType()->length($this::MINILENGTH, $this::MAXIMUMLENGTH))
            ->attribute('surname', v::stringType()->length($this::MINILENGTH, $this::MAXIMUMLENGTH))
            ->attribute('phoneNumber', v::phone(), mandatory: false)
        ;

        if ($schemaValidate->validate($data)) {
            return $data;
        }

        throw new InvalidValidationException("Invalid Data");
    }

    public function retrieve(string $userId): self
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
        // TODO update `$data` to the DAL later on (for updating database)
        return $this;
    }

    public function remove(string $userId): self
    {
        // TODO Lookup the DB user row with this userId
        return $this;
    }

}