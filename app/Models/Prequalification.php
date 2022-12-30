<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

class Prequalification extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $primaryKey = 'id';
    protected $foreignKey = 'applicant_id';
    protected $fillable=['first_name', 'last_name','applying_for','evaluation', 'reason_for_disqualification','remarks','additional_details','pertinent_conditions', 'created_at', 'updated_at'];

    public function applicant(){
        return $this->belongsTo(Applicant::class);
    }
}
