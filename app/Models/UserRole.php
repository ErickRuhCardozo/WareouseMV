<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    /** Can Create, Update and Delte */
    public const IS_ADMIN = 1;

    /** Can View and Request */
    public const IS_MANAGER = 2;

    /** Can View, Register Input and Output */
    public const IS_REGISTER = 3;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name'
    ];
}
