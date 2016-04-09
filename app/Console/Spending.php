<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    protected $fillable = ['user_id', 'amount', 'description', 'balance',];

}
