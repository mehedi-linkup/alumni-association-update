<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'participant', 'prefix' => 'participant', 'middleware' => ['auth', 'verified']], function () {
    Route::get('view-participant', 'ParticipantController@ViewParticipant')->name('view-participant');
    Route::post('payment-save', 'ParticipantController@PaymentSave')->name('save-payment');
    Route::get('get_participant_details', 'ParticipantController@GetParticipantDetails')->name('get_participant_details');
    Route::get('active-participant', 'ParticipantController@ActiveParticipant')->name('active-participant');
    Route::get('pending-participant', 'ParticipantController@PendingParticipant')->name('pending-participant');
    Route::get('edit-participant', 'ParticipantController@EditParticipant')->name('edit-participant');
    Route::get('add_payment/{id}', 'ParticipantController@AddPayment')->name('add_payment');
    Route::get('participant-payment', 'ParticipantController@ParticipantPayment')->name('participant-payment');
    Route::get('participant-status', 'ParticipantController@ParticipantStatus')->name('participant_status');
    Route::get('participant-list/{passing_year}', 'ParticipantController@ParticipantList')->name('participant_list');
    Route::get('participant-id-list/{passing_year}', 'ParticipantController@ParticipantIdList')->name('participant_id_list');
    Route::get('participant-invoice-list/{passing_year}', 'ParticipantController@ParticipantInvoiceList')->name('participant_invoice_list');
    Route::post('year-participant-list', 'ParticipantController@YearParticipantList')->name('participant_list_year');
    Route::post('get-participant', 'ParticipantController@getParticipantList')->name('get_participant_list');
    Route::post('get-participant-pending', 'ParticipantController@getParticipantpendingList')->name('get_participant_pending_list');
    Route::post('get-participant-active', 'ParticipantController@getParticipantactiveList')->name('get_participant_active_list');
    Route::post('save-participant', "ParticipantController@SaveParticipant")->name('save_participant');
    Route::post('delete-participant', "ParticipantController@DeleteParticipant")->name('delete_participant');
    Route::post('delete-participant-tr', "ParticipantController@DeleteParticipantTr")->name('delete_participant_tr');
    Route::get('print-participant-list/{id}', "ParticipantController@PrintParticipantList")->name('print_participant_list');
    Route::get('print-participant-id/{id}', "ParticipantController@PrintParticipantId")->name('print_participant_id');
    Route::get('downloadepdf-participant-list/{id}', "ParticipantController@DownloadPDFarticipantList")->name('downloadpdf-participant-list');
    Route::get('soronika-documents', "ParticipantController@SoronikaDocuments")->name('soronika-documents');
    Route::post('check-phone', "ParticipantController@CheckPhone")->name('check-phone');
});
