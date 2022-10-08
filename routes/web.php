<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*view-gallery
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@home')->name('/');
// about Route
Route::get('/about-history/{type}', 'FrontController@aboutHistory')->name('about-history');
Route::get('/about-achievement/{name}', 'FrontController@aboutAchievement')->name('about-achievement');

Route::get('/terms-conditions', 'FrontController@termsCondition')->name('terms-conditions');
Route::get('/privacy-policy', 'FrontController@privacyPolicy')->name('privacy-policy');
Route::get('/return-policy', 'FrontController@returnPolicy')->name('return-policy');

// Gallery Route
Route::get('/school-gallery', 'FrontController@schoolGallery')->name('school-gallery');
Route::get('/committee-gallery', 'FrontController@committeeGallery')->name('committee-gallery');
//Teacher Route
Route::get('/running-teacher', 'FrontController@runningTeacher')->name('running-teacher');
Route::get('/retired-teacher', 'FrontController@retiredTeacher')->name('retired-teacher');

Route::get('/contact-us', 'FrontController@contacts')->name('contact-us');
Route::post('/save_contact', 'FrontController@SaveContact')->name('save_contact');
Route::get('/signup', 'FrontController@registration')->name('signup');
Route::get('/forgot_password', 'FrontController@ForgotPassword')->name('forgot_password');
Route::get('/password_email', 'FrontController@PasswordEmail')->name('password_email');
Route::post('/password_code', 'FrontController@PasswordCode')->name('password_code');
Route::get('/change_password', 'FrontController@ChangePassword')->name('change_password');
Route::get('view-soronika', 'FrontController@ViewSoronika')->name('view-soronika');
Route::get('/signup-bangla', 'FrontController@registrationBangla')->name('signup-bangla');
Route::get('/dashboard', 'FrontController@Dashboard')->name('dashboard');
Route::get('/participant-invoice/{id}', 'FrontController@ParticipantInvoice')->name('participant-invoice');
Route::get('/add_payment/{id}', 'FrontController@AddPayment')->name('add_payment');
Route::post('/participant-register', 'FrontController@ParticipantRegister')->name('participant-register');
Route::post('/participant-registration', 'FrontController@ParticipantRegistration')->name('participant-registration');
Route::post('/check-phone-front', 'FrontController@CheckPhoneFront')->name('check-phone-front');
// Route::post('/participant-registration', 'FrontController@ParticipantRegistration')->name('participant-registration');
Route::get('/success-payment', 'FrontController@SuccessPayment')->name('success-payment');
Route::post('/payment-save', 'FrontController@PaymentSave')->name('payment.save');
Route::get('/how-to-apply', 'FrontController@howToApply')->name('how.apply');
Route::get('/who-can-apply', 'FrontController@whoCanApply')->name('who.apply');

//participant route
Route::prefix('/participant')->name('participant.')->namespace('Participant')->group(function () {
    Route::namespace('Auth')->group(function () {

        //Login Route
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('participant-logout');

        //Forgot Password Routes
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
    });
    Route::get('/dashboard', 'ParticipantController@index')->name('dashboard');
    Route::get('/profile', 'ParticipantController@Profile')->name('profile');
    Route::post('/update-participant', 'ParticipantController@UpdateParticipant')->name('update-participant');
    Route::post('/update-password', 'ParticipantController@UpdatePassword')->name('change');
});
//end partipant route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/get_collection', 'HomeController@GetCollection')->name('get_collection');


//category routes is start here
Route::get('view-category', 'CategoryController@ViewCategory')->name('view-category');
Route::get('edit-category', 'CategoryController@EditCategory')->name('edit-category');
Route::post('get-category', 'CategoryController@getCategoryList')->name('get-category-list');
Route::post('save-category', "CategoryController@SaveCategory")->name('save-category');
Route::post('delete-category', "CategoryController@DeleteCategory")->name('delete-category');
//category routes end here

//committee routes is start here
Route::get('view-committee', 'CommitteeController@ViewCommittee')->name('view-committee');
Route::get('edit-committee', 'CommitteeController@EditCommittee')->name('edit-committee');
Route::post('get-committee', 'CommitteeController@getCommitteeList')->name('get_committee_list');
Route::post('save-committee', "CommitteeController@SaveCommittee")->name('save_committee');
Route::post('delete-committee', "CommitteeController@DeleteCommittee")->name('delete_committee');
//committee routes end here


//Welcome Notes is start here
Route::get('edit-notes', 'WelcomeNotesController@EditNotes')->name('edit-notes');
Route::post('update-notes', "WelcomeNotesController@UpdateNotes")->name('update-notes');
//End Welcome Notes routes end here


//Welcome News is start here
Route::get('edit-news-notes', 'WelcomeNewsNotesController@EditNewsNote')->name('edit-news-notes');
//Route::post('get-notes', 'WelcomeNewsNotesController@getNotesList')->name('get-news-notes-list');
Route::post('save-news-notes', "WelcomeNewsNotesController@SaveNotes")->name('save-news-notes');
Route::post('update-news-notes', "WelcomeNewsNotesController@UpdateNews")->name('update-news-notes');
//End Welcome News routes end here

//Update News routes is start here
//Route::get('view-updatenews', 'UpdateNewController@ViewUpdateNews')->name('view-updatenews');
Route::get('edit-updatenews', 'UpdateNewController@EditUpdateNews')->name('edit-updatenews');
//Route::post('get-updatenews', 'UpdateNewController@getUpdateNewsList')->name('get-updatenews');
Route::post('save-updatenews', "UpdateNewController@SaveUpdateNews")->name('save-updatenews');
//Update News routes end here



//News routes is start here
Route::get('view-notice', 'NewsController@ViewNews')->name('view-news');
Route::get('edit-news', 'NewsController@EditNews')->name('edit-news');
Route::post('get-news', 'NewsController@getNewsList')->name('get_news_list');
Route::post('save-news', "NewsController@SaveNews")->name('save_news');
Route::post('delete-news', "NewsController@DeleteNews")->name('delete_news');
//News routes end here


//Teacher routes is start here
Route::get('view-teacher', 'TeacherController@ViewTeacher')->name('view-teacher');
Route::get('edit-teacher', 'TeacherController@EditTeacher')->name('edit-teacher');
Route::post('get-teacher', 'TeacherController@getTeacherList')->name('get-teacher');
Route::post('save-teacher', "TeacherController@SaveTeacher")->name('save-teacher');
Route::post('delete-teacher', "TeacherController@DeleteTeacher")->name('delete-teacher');
//Teacher routes end here


//About Us routes is start here
Route::get('view-about-us', 'AboutUsController@ViewAboutUs')->name('view-about-us');
Route::get('edit-about-us', 'AboutUsController@EditAboutUs')->name('edit-about-us');
Route::post('get-about-us', 'AboutUsController@getAboutUsList')->name('get-about-us');
Route::post('save-about-us', "AboutUsController@SaveAboutUs")->name('save-about-us');
Route::post('delete-about-us', "AboutUsController@DeleteAboutUs")->name('delete-about-us');
//About Us routes end here

//Slider routes is start here
Route::get('view-slider', 'SliderController@ViewSlider')->name('view-slider');
Route::get('edit-slider', 'SliderController@EditSlider')->name('edit-slider');
Route::post('get-slider', 'SliderController@getSliderList')->name('get-slider');
Route::post('save-slider', "SliderController@SaveSlider")->name('save-slider');
Route::post('delete-slider', "SliderController@DeleteSlider")->name('delete-slider');
//Slider routes end here

//Sponsor routes is start here
Route::get('view-sponsor', 'SponsorController@ViewSponsor')->name('view-sponsor');
Route::get('edit-sponsor', 'SponsorController@EditSponsor')->name('edit-sponsor');
Route::post('get-sponsor', 'SponsorController@getSponsorList')->name('get-sponsor');
Route::post('save-sponsor', "SponsorController@SaveSponsor")->name('save-sponsor');
Route::post('delete-sponsor', "SponsorController@DeleteSponsor")->name('delete-sponsor');
//Sponsor routes end here

//committee type route is start here
Route::get('get-committee-type/{type}', "FrontController@GetCommitteeType")->name('get-committee-type');
//Upcomming Meeting type route is start here


//Get News Fronttend News Page
Route::get('get-news-type/{type}', "FrontController@GetNewsType")->name('get-news-type');
//End Get News Fronttend News


//Category route is start here
Route::get('category/{id}/{name}', "FrontController@GetCategory")->name('get-category');
Route::get('sub-category/{id}/{name}', "FrontController@GetSubCategory")->name('get-sub-category');
//Category route is start here


// Massage Route
Route::get('view-massage', 'MassageController@ViewMassage')->name('view-massage');
Route::get('edit-massage', 'MassageController@EditMassage')->name('edit-massage');
Route::post('get-massage', 'MassageController@getMassageList')->name('get-massage');
Route::post('save-massage', "MassageController@SaveMassage")->name('save-massage');
Route::post('delete-massage', "MassageController@DeleteMassage")->name('delete-massage');
// End Massage Route
Route::get('get_contact_message', 'HomeController@GetContactMessage')->name('get_contact_message');
Route::post('delete_contact_message', 'HomeController@DeleteContactMessage')->name('delete_contact_message');

//collection report is start here
Route::get('collection_report', 'HomeController@CollectionReport')->name('collection_report');

//end here

//contact information route
Route::get('/contact', 'ContactInfoController@index')->name('contactinfo');
Route::post('/update/{contact}', 'ContactInfoController@contactInfoUpdate')->name('contact.update');


//Etc Information Route
Route::get('/etc', 'EtcController@index')->name('etc.index');
Route::post('etc/update/{etc}', 'EtcController@update')->name('etc.update');