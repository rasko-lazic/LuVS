<?php

namespace App\Api\Transformers;

use App\Spending;
use League\Fractal\TransformerAbstract;

class SpendingTransformer extends TransformerAbstract
{
    public function transform(Spending $spending)
    {
        return [
            'id' => (int) $spending['id'],
            'userId' => (int) $spending['user_id'],
            'amount' => (int) $spending['amount'],
            'description' => $spending['description'],
            'balance' => (int) $spending['balance'],

        ];
    }
}