<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'barbershop_name',
        'document',
        'responsible_name',
        'email',
        'facebook',
        'instagram',
        'phone',
        'whatsapp',
    ];

    public function openHours()
    {
        return $this->hasMany(CompanyOpenHours::class);
    }
}
