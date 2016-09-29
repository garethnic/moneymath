<?php

namespace App\Models\Concrete\Eloquent;

use App\Models\Concrete\AbstractEloquentRepository;
use App\Models\Contracts\Repositories\SummaryRepository;
use App\Models\Objects\Summary;

class EloquentSummaryRepository extends AbstractEloquentRepository implements SummaryRepository
{
    protected $model;

    public function __construct(Summary $model)
    {
        $this->model = $model;
    }
}