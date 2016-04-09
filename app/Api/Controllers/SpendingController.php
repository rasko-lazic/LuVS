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
        return $this->collection(Spending::all(), new SpendingTransformer);
    }
}