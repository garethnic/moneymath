<?php

namespace App\Models\Concrete\Eloquent;

use App\Models\Concrete\AbstractEloquentRepository;
use App\Models\Contracts\Repositories\ExpenseRepository;
use App\Models\Objects\Expense;

class EloquentExpenseRepository extends AbstractEloquentRepository implements ExpenseRepository
{
    protected $model;

    public function __construct(Expense $model)
    {
        $this->model = $model;
    }
}