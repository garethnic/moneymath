<?php

namespace App\Models\Concrete\Eloquent;

use App\Models\Concrete\AbstractEloquentRepository;
use App\Models\Contracts\Repositories\UserRepository;
use App\Models\Objects\User;

class EloquentUserRepository extends AbstractEloquentRepository implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}