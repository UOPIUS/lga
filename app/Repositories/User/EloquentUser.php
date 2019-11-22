<?php


namespace App\Repositories\User;

use App\Repositories\User\UserRepository;
use App\User;

class EloquentUser implements UserRepository
{

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return User::where('id', $id)
            ->firstOrFail();

    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
       $user = $this->model->findOrFail($id);
       $user->update($attributes);
       return $user;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }
}
