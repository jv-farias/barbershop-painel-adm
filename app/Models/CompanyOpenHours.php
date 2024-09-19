<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyOpenHours extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_time',
        'end_time',
        'week_day_id',
        'general_information_id',
        'hour_start_1',
        'hour_stop_1',
        'hour_start_2',
        'hour_stop_2',
        'hour_start_3',
        'hour_stop_3',
    ];

    public function weekDay()
    {
        return $this->belongsTo(WeekDays::class, 'week_day_id');
    }

    public function generalInfo()
    {
        return $this->belongsTo(GeneralInformation::class, 'general_information_id');
    }
}
