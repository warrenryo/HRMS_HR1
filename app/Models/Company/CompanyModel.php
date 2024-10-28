<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    use HasFactory;
    protected $table = 'company_profile';
    protected $fillable = [
        'name',
        'website',
        'industry',
        'location',
        'description'
    ];
}
