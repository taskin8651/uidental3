<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // About Page
    Route::get('about-pages', 'AboutPageController@index')->name('about-pages.index');
    Route::post('about-pages/update', 'AboutPageController@update')->name('about-pages.update');

     // Facilities
    Route::delete('facilities/destroy', 'FacilitiesController@massDestroy')->name('facilities.massDestroy');
    Route::resource('facilities', 'FacilitiesController');

    // Services
Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
Route::resource('services', 'ServicesController');

 // Doctors
    Route::delete('doctors/destroy', 'DoctorsController@massDestroy')->name('doctors.massDestroy');
    Route::resource('doctors', 'DoctorsController');

    Route::delete('galleries/destroy', 'GalleriesController@massDestroy')->name('galleries.massDestroy');
Route::resource('galleries', 'GalleriesController');
// Before After Results
Route::delete('before-after-results/destroy', 'BeforeAfterResultsController@massDestroy')->name('before-after-results.massDestroy');
Route::resource('before-after-results', 'BeforeAfterResultsController');

// Enquiries
Route::delete('appointment-enquiries/destroy', 'AppointmentEnquiriesController@massDestroy')->name('appointment-enquiries.massDestroy');
Route::resource('appointment-enquiries', 'AppointmentEnquiriesController', ['only' => ['index', 'show', 'destroy']]);
Route::delete('contact-enquiries/destroy', 'ContactEnquiriesController@massDestroy')->name('contact-enquiries.massDestroy');
Route::resource('contact-enquiries', 'ContactEnquiriesController', ['only' => ['index', 'show', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::get('about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

Route::get('services', [App\Http\Controllers\Frontend\ServiceController::class, 'index'])->name('services.index');
Route::get('services/{slug}', [App\Http\Controllers\Frontend\ServiceController::class, 'show'])->name('services.show');

Route::get('doctor-profile', [App\Http\Controllers\Frontend\DoctorController::class, 'index'])->name('doctor-profile');
Route::get('gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])->name('gallery');
Route::get('contact', [App\Http\Controllers\Frontend\ContactController::class, 'index'])->name('contact');
Route::get('contact.html', [App\Http\Controllers\Frontend\ContactController::class, 'index']);
Route::post('contact-enquiry', [App\Http\Controllers\Frontend\ContactController::class, 'store'])->name('contact.enquiry.store');
Route::get('book-appointment', [App\Http\Controllers\Frontend\AppointmentController::class, 'create'])->name('book-appointment');
Route::post('book-appointment', [App\Http\Controllers\Frontend\AppointmentController::class, 'store'])->name('appointment.store');
