<?php

namespace App\Api\Controllers;

use App\Spending;
use App\Api\Transformers\SpendingTransformer;

class SpendingController extends BaseController
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $spendings = Spending::paginate(5);
        return $this->paginator($spendings, new SpendingTransformer);
    }
}