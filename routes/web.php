<?php

use App\Models\Facility;
use App\Models\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   $facility = Facility::whereHas('specialties')->get();
   $facility = DB::table(table: 'facilities')->join('facility_specialties','facilities.id','=','facility_specialties.facility_id')->get();
    return '';
});
