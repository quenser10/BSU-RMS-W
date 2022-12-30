<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    use HasFactory;

    protected $primaryId = 'id';

    protected $fillable =[ 
        "first_name",
        "last_name",
        "email",
        "employee_id",
        "ip_address",
        "activity"
    ];

    protected $hidden =[ 
        "first_name",
        "last_name",
        "email",
        "employee_id",
        "ip_address",
        "activity"
    ];
}
