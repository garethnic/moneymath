<?php

namespace App\Models\Concrete\Eloquent;

use App\Models\Concrete\AbstractEloquentRepository;
use App\Models\Contracts\Repositories\IncomeRepository;
use App\Models\Objects\Income;

class EloquentIncomeRepository extends AbstractEloquentRepository implements IncomeRepository
{
    protected $model;

    public function __construct(Income $model)
    {
        $this->model = $model;
    }
}