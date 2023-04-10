<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'requester_id',
        'product_ids_csv',
        'date',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function requester() {
        return $this->hasOne(User::class, 'id', 'requester_id');
    }
}
