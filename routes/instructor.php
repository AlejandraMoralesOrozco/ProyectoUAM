<?php

use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\CertificatesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\HomeController;
use App\Http\Controllers\Instructor\ObservationController;
use App\Http\Controllers\Instructor\PaymentsController;



Route::get('/course/{id}', [CourseController::class, 'show'])->name('instructor.courses.show');
Route::post('/courses', [CourseController::class, 'store'])->name('instructor.courses.store');
Route::get('/course', [CourseController::class, 'index'])->name('instructor.courses.index');



//Checar estas rutas
/*Route::post('/upload-document', [HomeController::class, 'uploadDocument'])->name('upload.document');
Route::post('/update-document/{document}', [HomeController::class, 'updateDocument'])->name('update.document');

Route::post('/instructor/person-type', [HomeController::class, 'personType'])->name('person.type');
Route::get('/instructor', [HomeController::class, 'index'])->name('instructor.index');

//Route::get('/course', [CourseController::class, 'index'])->name('instructor.course.index');


//Observaciones
Route::get('/observations', [ObservationController::class, 'index'])->name('observation.index');

//Pagos
Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');

//Certificados
Route::get('/certificates', [CertificatesController::class, 'index'])->name('certificates.index');
*/
