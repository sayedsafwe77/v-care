<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
        /** @use HasFactory<\Database\Factories\DoctorFactory> */
        use HasFactory,Filterable;

        function specialty() : BelongsTo {
            return $this->belongsTo(Specialty::class);
        }
        function facilities() : BelongsToMany {
            return $this->belongsToMany(Facility::class,'facility_doctors');
        }
}
