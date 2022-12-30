<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audits extends Model
{
    use HasFactory;

    public function adminAuditAccount(){
        return $this->belongsTo(AdminAccount::class, 'user_id');
    }

    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';

    protected $fillable = [
        'user_type',
        'event',
        'auditable_type',
        'auditable_id',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent',
        'tags',
        'created_at'
        
    ];
}
