<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' ,'company_id', 'pay_per_hour'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function timeSheets()
    {
        return $this->hasMany(TimeSheet::class);
    }

    public function extraWorks()
    {
        return $this->hasMany(ExtraWork::class);
    }
}
