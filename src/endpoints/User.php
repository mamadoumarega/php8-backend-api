<?php

namespace Mamadou\Php8BackendApi;

class User
{
    public readonly int $userId;
    public function __construct(
        public readonly string $email,
        public readonly string $name,
        public readonly string $phoneNumber
    ){
    }

    /**
     * @return self
     */
    public function create(): self
    {
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

    public function update(): self
    {
        return $this;
    }

    public function remove(): self
    {
        return $this;
    }

}