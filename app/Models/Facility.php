<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facility extends Model
{
    //
    function specialties() : BelongsToMany {
        return $this->belongsToMany(Specialty::class,'facility_specialties');
    }
    function zone() : BelongsTo {
        return $this->belongsTo(Zone::class);
    }
}
