<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class OpenedJob extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'job_id';
    protected $fillable =['job_title', 'job_image', 'item_number', 'status', 'salary', 'place_of_assignment', 'education', 'training', 'experience','eligibility', 'competency','duties','opening_date','closing_date','updated_at','created_at'];

    public function scopeFilter($query, array $filters){
        
        if($filters['search'] ?? false){
            $query->where('job_title', 'like', '%' . request('search') . '%')
                ->orWhere('place_of_assignment', 'like', '%' . request('search') . '%');
                // ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }
    
}

