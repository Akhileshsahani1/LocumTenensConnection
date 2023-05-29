<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Practice\AuthController;
use App\Http\Controllers\Practice\PracticeController;
use App\Http\Controllers\Practice\PracticeDetailController;
// admin
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\resolutionController;
use App\Http\Controllers\Admin\HomeController;

// provider
use App\Http\Controllers\Provider\UserController;
use App\Http\Controllers\Provider\ProviderRegistercontroller;
use App\Http\Controllers\Provider\ProviderLoginController;
use App\Http\Controllers\Provider\ProviderDetailsController;
use App\Http\Controllers\Provider\ProviderHomeController;
use App\Http\Controllers\Provider\Auth\ForgotPasswordController;
use App\Http\Controllers\Provider\ProviderChatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'DisplayHome'])->name('home');


Route::group(['prefix' => 'practice'], function () {
    Route::group(['middleware' => 'practice.guest'], function () {
        Route::get('/Welcome', [PracticeController::class, 'home'])->name('practice.home');
        Route::get('/signup', [PracticeController::class, 'signup_view'])->name('signup_view');

        Route::post('/signups', [PracticeController::class, 'signUp'])->name('signupProfessional');
        Route::post('/signupdetails', [PracticeController::class, 'Professionaldetails'])->name('Professionaldetails');
        Route::post('/Professionalsubmit', [PracticeController::class, 'detailSubmit'])->name('ProfessionalSubmit');
        Route::get('/signupProfessionalView', [PracticeController::class, 'signupProfessionalView'])->name('signupProfessional.view');
        Route::get('/signupProfessionalprevious', [PracticeController::class, 'signupProfessionalprevious'])->name('signupProfessionalprevious');
        Route::get('/ProfessionalDetailsView', [PracticeController::class, 'ProfessionalDetailsView'])->name('ProfessionalDetailsView');
        Route::post('/ProfessionalDetailsubmit', [PracticeController::class, 'ProfessionalDetailSubmit'])->name('ProfessionalDetailSubmit');
        Route::get('forget', [PracticeController::class, 'forgetView'])->name('forgetView');
        Route::post('forget/matchemail', [PracticeController::class, 'matchEmail'])->name('matchEmail');
        Route::get('resetview', [PracticeController::class, 'resetview'])->name('resetview');
        Route::put('Resetpassword/{id}', [PracticeController::class, 'resetPassword'])->name('PracticeresetPassword');
        Route::get('/success', [PracticeController::class, 'success'])->name('success');
        Route::post('/login', [AuthController::class, 'Authentication'])->name('Authentication');

        /* ****************************************************** Ajax Route ******************************************** */

        Route::post('/terms', [PracticeDetailController::class, 'terms_service'])->name('terms_service');
        Route::post('/terms/privacy_Policy', [PracticeDetailController::class, 'privacy_Policy'])->name('privacy_Policy');
        Route::post('/terms/payment_Methods', [PracticeDetailController::class, 'payment_Methods'])->name('payment_Methods');
        Route::post('/terms/liability', [PracticeDetailController::class, 'liability'])->name('liability');

    });

    Route::group(['middleware' => 'practice.auth'], function () {
        Route::group(['middleware' => 'practice.auth'], function () {

            Route::get('/dashboard', [PracticeDetailController::class, 'dashboard'])->name('dashboard');
            Route::get('/personaldetails/{id}', [PracticeDetailController::class, 'personaldetails'])->name('personaldetails');

            //made by gaurav for test
            Route::post('provider-calendar-crud-ajax', [PracticeDetailController::class, 'calendarEvents'])->name('calendarEvents');


            Route::get('/myprofile', [PracticeDetailController::class, 'myprofile'])->name('myprofile');
            Route::get('/myprofileedit', [PracticeDetailController::class, 'myprofileedit'])->name('myprofileedit');
            Route::get('/privacypolicy', [PracticeDetailController::class, 'privacypolicy'])->name('privacypolicy');
            Route::get('/paymentmethods', [PracticeDetailController::class, 'paymentmethods'])->name('paymentmethods');
            Route::get('/terms', [PracticeDetailController::class, 'terms'])->name('terms');
            Route::get('/Liabilitys', [PracticeDetailController::class, 'Liabilitys'])->name('Liabilitys');
            Route::get('/chat', [PracticeDetailController::class, 'chat'])->name('chat');
            Route::get('/rating', [PracticeDetailController::class, 'rating'])->name('rating');
            Route::get('/ticketGenreated', [PracticeDetailController::class, 'ticketGenreated'])->name('ticketGenreated');
            Route::get('/RaiseTicket', [PracticeDetailController::class, 'RaiseTicket'])->name('RaiseTicket');
            Route::Post('/PracticeRaiseTicket', [PracticeDetailController::class, 'PracticeTicketsubmit'])->name('PracticeTicketsubmit');
            Route::get('/PracticeTickeGET', [PracticeDetailController::class, 'FetchRaceTicket'])->name('PracticeRaceTicketFetch');
            Route::get('/logout', [PracticeController::class, 'logout'])->name('logout.practice');
            Route::post('/Practicehire', [PracticeController::class, 'PracticeHire'])->name('PracticeHire');
            Route::PUT('/profileUpdate/{id}', [PracticeDetailController::class, 'profileUpdate'])->name('profileUpdate');
            Route::get('/passwordchange', [PracticeDetailController::class, 'passwordchange'])->name('passwordchange');
            Route::Post('/Practicepasswordchange', [PracticeDetailController::class, 'passowrdUpdate'])->name('PracticePasswordUpdate');
            Route::Post('/PracticeSearch', [PracticeDetailController::class, 'PracticeSearch'])->name('PracticeSearch');




        });



    });
});

Route::fallback(function () {
    return \Response::view('Practice.notfound');
});





/*     ****************************Provider*********************************************  */


Route::group(['prefix' => 'provider'], function () {

    Route::get('/home', [ProviderHomeController::class, 'home'])->name('index');
    Route::group(['middleware' => 'provider.guest'], function () {
        Route::get('login', [ProviderLoginController::class, 'showform'])->name('provider.login');
        Route::post('provider-login', [ProviderLoginController::class, 'checklogin'])->name('provider.submit');
        //register form 
        Route::get('register', [ProviderRegistercontroller::class, 'registrationStepFirst'])->name('Provider.signupStepFirst');
        Route::post('register-step1-submit', [ProviderRegistercontroller::class, 'createSubmitStepFirst'])->name('provider.createsubmit');
        Route::get('register-step2', [ProviderRegistercontroller::class, 'registrationStepSecond'])->name('Provider.signupStepSecond');
        Route::post('register-step2-submit', [ProviderRegistercontroller::class, 'createSubmitStepSecond'])->name('provider.SubmitStepSecond');
        Route::get('register-step3', [ProviderRegistercontroller::class, 'registrationStepThird'])->name('Provider.signupStepThird');
        Route::get('previousregister-step3', [ProviderRegistercontroller::class, 'ThirdStep'])->name('PreviousStepThird');
        Route::post('register-step3-submit', [ProviderRegistercontroller::class, 'createSubmitStepThird'])->name('provider.SubmitStepThird');
        Route::get('register-step4', [ProviderRegistercontroller::class, 'registrationStepFour'])->name('Provider.signupStepFour');
        Route::post('register-step4-submit', [ProviderRegistercontroller::class, 'createSubmitStepFour'])->name('provider.SubmitStepFour');
        Route::get('Previousregister-step4', [ProviderRegistercontroller::class, 'PreviousStepFour'])->name('PreviousStepFour');

        Route::get('registrationStepFive', [ProviderRegistercontroller::class, 'registrationStepFive'])->name('signupStepFive');

        // Route::get('FiveRegister', [ProviderRegistercontroller::class, 'FiveRegister'])->name('signupStepFive');

        Route::post('register-step5-submit', [ProviderRegistercontroller::class, 'createSubmitStepFive'])->name('provider.SubmitStepFive');
        Route::get('Previous-egistrationStepFive', [ProviderRegistercontroller::class, 'PreviousStepFive'])->name('PreviousStepFive');
        Route::post('provider-createsubmit/getCity', [ProviderRegistercontroller::class, 'getCity'])->name('provider.getCity');

        Route::get('termsCondition', [ProviderRegistercontroller::class, 'termscondition'])->name('Provider.termsCondition');
        Route::get('forget-password', [ForgotPasswordController::class, 'forgetPasswordLoad'])->name('forget.password.get');
        Route::post('provider-forget-password', [ForgotPasswordController::class, 'forgetPassword'])->name('forget.password.post');
        Route::get('resetPassword', [ForgotPasswordController::class, 'resetPasswordLoad'])->name('resetPasswordLoad');
        Route::post('provider-resetPassword', [ForgotPasswordController::class, 'resetPassword'])->name('provider-resetPassword');
        Route::get('resetPasswordSuccess', [ForgotPasswordController::class, 'forgetPasswordSuccess'])->name('provider-resetPasswordSuccess');


       // term and condition route json

       Route::put('/provider-terms', [ProviderRegistercontroller::class, 'termsService'])->name('termsService');
       Route::put('/provider-privacypolicy', [ProviderRegistercontroller::class, 'privacyPolicy'])->name('privacyPolicy');
       Route::put('/provider-paymentMethod', [ProviderRegistercontroller::class, 'propaymentMethod'])->name('propaymentMethod');
       Route::put('/provider-liability', [ProviderRegistercontroller::class, 'proLiability'])->name('proLiability');

    });

    Route::group(['middleware' => 'provider.auth'], function () {

        Route::get('dashboard', [ProviderLoginController::class, 'showdashboard'])->name('provider.dashboard');
        Route::get('logout', [ProviderLoginController::class, 'logout'])->name('provider.logout');
        Route::get('changePassword', [ProviderLoginController::class, 'changePassword'])->name('provider.changePassword');
        Route::post('passwordChange', [ProviderLoginController::class, 'changePasswordUpdate'])->name('provider.passwordChange');
        Route::get('profile', [ProviderDetailsController::class, 'profileLoad'])->name('profile.get');
        Route::get('clinic-details/{id}', [ProviderDetailsController::class, 'ProviderClinicShow'])->name('profileclinic.get');

        Route::get('profile-edit', [ProviderDetailsController::class, 'profileLoadedit'])->name('profile.edit');
        Route::put('profileUpdate/{id}', [ProviderDetailsController::class, 'profileUpdates'])->name('provider.profileUpdates');
        Route::post('provider-getcityid', [ProviderDetailsController::class, 'getCityById'])->name('provider.getCityById');

        
        Route::get('chat', [ProviderChatController::class, 'providerChat'])->name('provider.Chat');

        Route::get('raiseticket', [ProviderLoginController::class, 'providerRaiseTicket'])->name('provider.raiseTicket');
        Route::post('raiseticketCreate', [ProviderLoginController::class, 'raiseTicket'])->name('provider.RaiseTicket');

        Route::get('ticketGenerate', [ProviderLoginController::class, 'TicketGenerate'])->name('provider.ticketGenerate');
        Route::get('availability', [ProviderLoginController::class, 'availability'])->name('provider.availability');

        Route::post('provider-calendar-crud-ajax', [ProviderLoginController::class, 'calendarEvents'])->name('provider.calendarEvents');
        Route::post('provider-disable-calander', [ProviderLoginController::class, 'disablecalander'])->name('provider.disablecalander');
        Route::post('provider-able-calander', [ProviderLoginController::class, 'ablecalander'])->name('provider.ablecalander');





    });
});




/*     ****************************Provider end*********************************************  */

/*     ****************************Admin Route*********************************************  */


Route::group(['prefix' => 'Admin'], function() {

    Route::group(['middleware' => 'admin.guest'], function(){
        Route::get('/login',[AdminAuthController::class,'index'])->name('login');
        Route::post('/login-auth',[AdminAuthController::class,'loginAuth'])->name('loginAuth');

        Route::get('/forget-password-admin', [AdminAuthController::class,'forgetPasswordLoadAdmin'])->name('forgetPasswordLoad');
        Route::post('/forget-password-admin', [AdminAuthController::class,'forgetPasswordAdmin'])->name('forgetPassword');
        Route::get('/reset-password-admin', [AdminAuthController::class,'resetPasswordLoadAdmin']);
        Route::post('/reset-password-admin', [AdminAuthController::class,'resetPasswordAdmin'])->name('resetPassword');
        Route::POST('submit-contact', [HomeController::class, 'contactSubmit'])->name('contactSubmit');

    });
    
    Route::group(['middleware'=> 'admin.auth'], function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admindashboard');
        Route::get('/changePassword',[AdminAuthController::class,'changePassword'])->name('adminchangePassword');
        Route::post('/password-update',[AdminAuthController::class,'updatePassword'])->name('updatePassword');
      
        Route::get('/provider',[AdminController::class,'provider'])->name('provider');
        Route::get('/provider-details/{id}', [AdminController::class,'getProviderDetailsById'])->name('getProviderDetailsById');
        Route::get('/provider-details-json/{id}', [AdminController::class,'getProviderDetailsJson'])->name('getProviderDetailsJson');
        Route::post('provider-details-update/{id}', [AdminController::class,'updateProviderDetails'])->name('updateProviderDetails');
        Route::get('provider-suspend/{id}', [AdminController::class,'ProviderSuspend'])->name('ProviderSuspend');
        Route::get('provider-delete/{id}', [AdminController::class,'DeleteProvider'])->name('DeleteProvider');
        
        // Practice
         
        Route::get('/practice',[AdminController::class,'practice'])->name('practice');
        Route::get('/practice-details/{id}',[AdminController::class,'practiceShowById'])->name('getPracticeDataById');
        Route::get('/practice-update-status/{id}',[AdminController::class,'updatePracticeStatus'])->name('updatePracticeStatus');
        Route::get('/practice-details-json/{id}', [AdminController::class,'getPracticeDetailsJson'])->name('getPracticeDetailsJson');
        Route::post('/practice-details-update/{id}', [AdminController::class,'updatePracticeDetails'])->name('updatePracticeDetails');
        Route::get('practice-suspend/{id}', [AdminController::class,'PracticeSuspend'])->name('PracticeSuspend');
        Route::get('practice-delete/{id}', [AdminController::class,'DeletePractice'])->name('DeletePractice');
        Route::get('/adminlogout',[AdminAuthController::class,'logoutAdmin'])->name('logoutAdmin');

        // Resolution

        Route::get('/resolutions',[resolutionController::class,'ResolutionsCases'])->name('ResolutionsCases');
        Route::post('/admin-update-resolutionprovider/{id}', [resolutionController::class,'UpdateTicketProvider'])->name('UpdateTicketProvider');
        Route::post('/admin-update-resolutionpractice/{id}', [resolutionController::class,'UpdateTicketPractice'])->name('UpdateTicketPractice');

        // adminprofile

        Route::get('/admin-profile', [AdminAuthController::class,'profileLoadPage'])->name('profileLoadPage');
        Route::get('/admin-profile-edit', [AdminAuthController::class,'profileeditPage'])->name('profileeditPage');
        Route::post('/admin-profile-update', [AdminAuthController::class,'UpdateProfileAdmin'])->name('UpdateProfileAdmin');

        //AdminHome
        Route::get('/allpages', [HomeController::class,'allpages'])->name('allpages');
        Route::get('/banner-home', [HomeController::class,'banner'])->name('banner');
        Route::post('/banner-submit', [HomeController::class, 'submitBanner'])->name('submitBanner');
        Route::get('/banner-edit/{id}', [HomeController::class, 'editBanner'])->name('editBanner');
        Route::post('/banner-update/{id}', [HomeController::class, 'updateBanner'])->name('updateBanner');
        Route::get('/our-mission', [HomeController::class, 'ourMission'])->name('our-mission');
        Route::post('/submit-ourmission', [HomeController::class, 'submitMission'])->name('submitMission');
        Route::get('/edit-ourmission/{id}', [HomeController::class, 'editMission'])->name('editMission');
        Route::post('/update-ourmission/{id}', [HomeController::class, 'updateMission'])->name('updateMission');
        Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutUs');
        Route::post('/submit-about-us', [HomeController::class, 'submitAboutUs'])->name('submitAboutUs');
        Route::get('/edit-about-us/{id}', [HomeController::class, 'editAboutUs'])->name('editAboutUs');
        Route::post('/update-about-us/{id}', [HomeController::class, 'updateAboutUs'])->name('updateAboutUs');

        Route::get('/testimonial-load',[HomeController::class, 'testimonial'])->name('testimonialpageLoad');
        Route::get('/add-testimonial',[HomeController::class, 'addTestimonal'])->name('addTestimonal');
        Route::post('/submit-testimonial', [HomeController::class, 'submitTestimonial'])->name('submitTestimonial');
        Route::get('/edit-testimonial/{id}', [HomeController::class, 'testimonialEdit'])->name('testimonialEdit');
        Route::post('/update-testimonial/{id}', [HomeController::class, 'updateTestimonial'])->name('updateTestimonial');
        Route::get('/faq',[HomeController::class, 'loadFqa'])->name('openFAQ');
        Route::post('/submit-faq', [HomeController::class, 'faqSubmit'])->name('faqSubmit');
        Route::get('/faq-edit/{id}',[HomeController::class, 'faqEdit'])->name('faqEdit');
        Route::post('/faq-update/{id}',[HomeController::class, 'faqUpdate'])->name('faqUpdate');
        Route::get('/faq-list',[HomeController::class, 'faqList'])->name('faqList');
        });
});

/*     ****************************Admin End*********************************************  */