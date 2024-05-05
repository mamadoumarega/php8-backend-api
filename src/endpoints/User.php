<?php

namespace Mamadou\Php8BackendApi;

use Mamadou\Php8BackendApi\Validation\Exception\InvalidValidationException;
use Mamadou\Php8BackendApi\Validation\UserValidation;
use Respect\Validation\Validator as v;

class User
{
    public readonly ?string $userId;

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
        $userValidation  = new UserValidation($data);
        $schemaValidate = $userValidation->isCreationSchemaValid();

        if ($schemaValidate) {
            return $data;
        }

        throw new InvalidValidationException("Invalid user payload");
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function retrieve(string $userId): static
    {
        if (v::uuid()->validate($userId)) {
            $this->userId = $userId;
        } else {
            throw new InvalidValidationException("User does not exists");
        }

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
     * @return object
     */
    public function update(mixed $data): object
    {
        $userValidation  = new UserValidation($data);
        $schemaValidate = $userValidation->isUpdateSchemaValid();

        if ($schemaValidate) {
            return $data;
        }

        throw new InvalidValidationException("Invalid user payload");
    }

    public function remove(string $userId): self
    {
        // TODO Lookup the DB user row with this userId
        return $this;
    }

}