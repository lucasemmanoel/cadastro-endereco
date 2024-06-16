<?php

namespace App\Repositories;

use App\Repositories\Interface\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface {
    
    protected User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(string $id) 
    {
        return $this->model->find($id);
    }

    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->firstOrFail();
    }

    public function createTokenByEmail(string $email)
    {
        $user = $this->findByEmail($email);

        return $user->createToken('auth_token')->plainTextToken;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update (string $id, array $data)
    {
        $user = $this->findById($id);
        $user->update($data);
        return $user;
    }
    
    public function delete (string $id)
    {
        $user = $this->findById($id);
        return $user->delete();
    }
}