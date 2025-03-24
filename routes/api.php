<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\DoctorTitleController;
use App\Http\Controllers\TestApiController;

Route::get('/test/{name}',[TestApiController::class,'test']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(DoctorTitleController::class)->prefix('doctor_title')->group(function () {
    Route::get('/', 'index');
    Route::get('/{title}', 'show');
    Route::post('/', 'store');
    Route::put('/{title}', 'edit');
    Route::delete('/{title}', 'delete');
});


Route::controller(CountryController::class)->prefix('countries')->group(function () {
    Route::get('/', 'index');
    Route::get('/{country}', 'show');
    Route::post('/', 'store');
    Route::put('/{country}', 'edit');
    Route::delete('/{country}', 'destroy');
});



Route::controller(SpecialityController::class)->prefix('specialities')->group(function () {
    Route::get('/', 'index');
    Route::get('/{speciality}', 'show');
    Route::post('/', 'store');
    Route::put('/{speciality}', 'edit');
    Route::delete('/{speciality}', 'destroy');
});


/*********   home page api's */
//api to login 
//api to create account
// search api for doctor (specialty_name,city_name)  or (doctor_name)
// api to get all services
// api for health insurance
// api to get special offers (remaining_count)
// api to return top specialties
// api to ask a medical question 
//api to book laboratory service
// api to return social media links
// api to download android
// api to download ios

/*********   contact us page api's */
// api to send contact

/*********   special offers page api's */
// api to get special offers (rate,rate_numbers)
// api to get services have offers

/*********   offer details page api's */
// api to offer details
// api to get doctor details
// api to get clinic details
// api to get average rating for clinic,doctor,assistant,overall with count for every rating value with count for visitors
// api to get top four comments for clinic
// api to get available slots per month
// api to create booking


/*********   doctors page api's */
// api to get all doctors
// api to get all specialties
// api to get doctor filter count(title,gender,availability,entity,price)
// api to sort doctors by price (asc,desc)
// api to get doctors by specialty 
// api to go to a doctor information

/********* Doctor information page */
//api to get the doctor details 
// api to get clinic details
// api to get average rating for doctor, clinic, assistant, overall with count for every rating value with count for visitors.
// api to get top six comments for the doctor with patient details.
// api to make a booking.

/*********   book now page api's */
// api to get book now page with info(Doctor's details, select a day according to doctor's time)
// api to get the mobile number key according to country.
// api to get insurance dropdown options.
// api to send patient details.

/************ Ask a medical question */
// api to get all the specialties 
// api to send the submit the question

/************ login page */
//api for home page.
//api for forget password
//api to submit login
//api to create an account

/************ forget password page */
//api for home page.
//api to send OTP.
//api to login page

/************ OTP page */
//api for home page.
//api to reset password

/************ reset password page */
//api to reset new password


/************ create an account page */
//api for sign up
//api to login page








