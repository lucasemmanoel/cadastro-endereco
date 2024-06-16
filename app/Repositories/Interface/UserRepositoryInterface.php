<?php

namespace App\Repositories\Interface;

interface UserRepositoryInterface
{
    public function all();
    public function findById(string $id);
    public function findByEmail(string $email);
    public function create(array $data);
    public function update(string $id, array $data);
    public function delete(string $id);
    public function createTokenByEmail(string $email);
}