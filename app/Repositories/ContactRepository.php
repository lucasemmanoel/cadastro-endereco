<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\Interface\ContactRepositoryInterface;

class ContactRepository implements ContactRepositoryInterface
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    public function update($id, array $data)
    {
        return $this->model->update($id, $data);
    }
    public function delete($id)
    {
        return $this->model->delete($id);
    }
    public function findById($id)
    {
        return $this->model->find($id);
    }
    public function findByName(string $name)
    {
        return $this->model->findByName($name);
    }
    public function findByEmail(string $email)
    {
        return $this->model->findByEmail($email);
    }
    public function findByPhone(string $phone)
    {
        return $this->model->findByPhone($phone);
    }
}