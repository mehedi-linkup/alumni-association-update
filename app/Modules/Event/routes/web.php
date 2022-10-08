<?php

use App\Modules\Event\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'event', 'prefix' => 'event', 'middleware' => ['auth', 'verified']], function () {

//    Route::get('/', 'UsersController@index')->name('users.index');
//    Route::get('create', "UsersController@create")->name('users.create');
//    Route::post('store', "UsersController@store")->name('users.store');
//    Route::get('/{user}', "UsersController@show")->name('users.show');
//    Route::get('/{user}/edit', "UsersController@edit")->name('users.edit');
//    Route::delete('/{user}', "UsersController@destroy")->name('users.destroy');

// Gallery route
    Route::get('view-gallery', 'EventController@ViewGallery')->name('view-gallery');
    Route::post('get-gallery', 'EventController@getList')->name('get_photo_gallery');
    Route::post('save-gallery', "EventController@SaveGallery")->name('save_gallery');
    Route::post('update-gallery', "EventController@UpdateGallery")->name('update_gallery');
    Route::get('edit-gallery/{id}', "EventController@EditGallery")->name('edit_gallery');
    Route::post('delete-gallery', "EventController@DeleteGallery")->name('delete-gallery');
    Route::get('gallery/edit/{id}', "EventController@EditEvent")->name('edit_event');
    Route::post('get-images', 'EventController@getImageList')->name('get_image_list');

//    downloads part
    Route::get('view-downloads', 'EventController@ViewDownloads')->name('view-downloads');
    Route::get('edit-downloads', 'EventController@EditDownloads')->name('edit-downloads');
    Route::post('get-downloads', 'EventController@getDownloadList')->name('get_download_list');
    Route::post('save-downloads', "EventController@SaveDownloads")->name('save_downloads');
    Route::post('delete-downloads', "EventController@DeleteDownloads")->name('delete_downloads');
//    end download part
});
