<?php

namespace App;
use Jenssegers\Date\Date;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = [
        'date'
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getDeletedAtAttribute($date)
	{
		return new Date($date);

	}
}
