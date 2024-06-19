<?php

namespace App\Repositories\Interface;

interface ContactRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function findById($id);
    public function findByName(string $name);
    public function findByEmail(string $email);
    public function findByPhone(string $phone);
}