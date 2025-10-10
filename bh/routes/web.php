<?php

use App\Http\Controllers\AdminController;

use App\Http\Controllers\dashboard\ContactsController;
use App\Http\Controllers\dashboard\DoctorController;
use App\Http\Controllers\dashboard\PatientController;
use App\Http\Controllers\dashboard\PrivacyPolicyController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\TermsConditionsController;
use App\Http\Controllers\dashboard\UsageConditionsController;
use App\Http\Controllers\dashboard\WhousController;
use App\Http\Controllers\MyFatoorahController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
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
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return redirect(app()->getLocale());
    //  return "Cache is cleared";
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return redirect(app()->getLocale());
});

            Route::get('/paypal/payment-testing', [PaymentController::class, 'paymentTesting'])->name('payment.testing');


Route::group(
    [
        'prefix' => '{locale}',
        'where' => ['locale' => '[a-zA-Z]{2}'],
        'middleware' => 'setlocale'
    ],
    function() {
        Route::get('/', [\App\Http\Controllers\dashboard\PageController::class, "index"])->name("/");
        Route::get('/whous', [\App\Http\Controllers\dashboard\PageController::class, "whous"]);
        Route::get('/how-we-work', [\App\Http\Controllers\dashboard\PageController::class, "how_we_work"]);
        Route::get('/contacts', [\App\Http\Controllers\dashboard\PageController::class, "contacts"]);
        Route::post('/send-to-mail', [\App\Http\Controllers\dashboard\EmailContactController::class, "send_to_mail"]);
        Route::get('/specialties', [\App\Http\Controllers\dashboard\PageController::class,"show_all_specialties"]);
        Route::get('/specialties/{id}', [\App\Http\Controllers\dashboard\PageController::class,"show_doctors_in_specialty"]);
        Route::get('/show_video/{id}', [\App\Http\Controllers\dashboard\PageController::class,"show_video"]);

        Route::get('/refund-policy', [\App\Http\Controllers\dashboard\PageController::class, "refund_policy"]);
        Route::get('/privacy-policy', [\App\Http\Controllers\dashboard\PageController::class, "privacy_policy"]);
        Route::get('/terms-and-conditions', [\App\Http\Controllers\dashboard\PageController::class, "terms_conditions"]);
        Route::get('/doctors/show/{id}', [\App\Http\Controllers\dashboard\DoctorController::class, "show"]);



        Route::get('/coupon/test/{number}', [\App\Http\Controllers\dashboard\CouponController::class, "test"]);



        Route::group(['prefix' => '/paypal/'], function(){
            Route::view('/payment', 'site.paypal.index')->name('create.payment');
            Route::get('handle-payment', [PaymentController::class, 'handlePayment'])->name('make.payment');
            Route::get('cancel-payment', [PaymentController::class, 'paymentCancel'])->name('cancel.payment');
            Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('success.payment');



            Route::get('/paypal/payment-testing', [PaymentController::class, 'paymentTesting'])->name('payment.testing');
        });

        // Stripe Payment Routes
        Route::group(['prefix' => '/stripe/'], function(){
            Route::get('checkout', [\App\Http\Controllers\StripeController::class, 'showCheckout'])->name('stripe.checkout');
            Route::post('create-payment-intent', [\App\Http\Controllers\StripeController::class, 'createPaymentIntent'])->name('stripe.create.payment.intent');
            Route::post('create-checkout-session', [\App\Http\Controllers\StripeController::class, 'createCheckoutSession'])->name('stripe.create.checkout.session');
            Route::get('success', [\App\Http\Controllers\StripeController::class, 'handleSuccess'])->name('stripe.success');
            Route::get('cancel', [\App\Http\Controllers\StripeController::class, 'handleCancel'])->name('stripe.cancel');
            Route::post('webhook', [\App\Http\Controllers\StripeController::class, 'handleWebhook'])->name('stripe.webhook');
        });

        Route::group(['prefix' => '/myfatoorah/'], function(){
            Route::post('handle-payment', [MyFatoorahController::class, 'index'])->name('make.payment');
            Route::get('cancel-payment', [MyFatoorahController::class, 'paymentCancel'])->name('cancel.payment');
            Route::get('payment-success', [MyFatoorahController::class, 'paymentSuccess'])->name('success.payment');
            // Route::get('payment-testing', [PaymentController::class, 'paymentTesting'])->name('payment.testing');
        });


        Route::group(['prefix' => '/consultations-files/'], function(){
            Route::post('save', [\App\Http\Controllers\dashboard\ConsultationFileController::class,"save_files"]);
            Route::post('save-files-from-modal', [\App\Http\Controllers\dashboard\ConsultationFileController::class,"save_files_from_modal"]);

            Route::get('destroy', [\App\Http\Controllers\dashboard\ConsultationFileController::class,"destroy"]);


            Route::get('delete-file', [\App\Http\Controllers\dashboard\ConsultationFileController::class,"destroy"]);
        });

//        Route::get('/step5', [\App\Http\Controllers\dashboard\PageController::class,"show_video"]);

        Route::group(['prefix' => '/doctors/appointments/'], function(){
            Route::get('create-five-appointments/{consultation_id}', [\App\Http\Controllers\dashboard\AppointmentController::class,"create_five_appointments"]);
            Route::post('store-five-appointments', [\App\Http\Controllers\dashboard\AppointmentController::class,"store_five_appointments"]);
        });
        Route::group(['prefix' => '/patients/appointments/'], function(){
            Route::post('ask-for-appointment', [\App\Http\Controllers\dashboard\AppointmentController::class,"ask_for_appointment_by_patient"]);
            Route::get('ask-for-appointment2/{consultation_id}', [\App\Http\Controllers\dashboard\AppointmentController::class,"ask_for_appointment_by_patient2"]);
            Route::get('create-choose-one-appointment/{consultation_id}', [\App\Http\Controllers\dashboard\AppointmentController::class,"create_choose_one_appointment"]);
            Route::post('store-choose-one-appointment', [\App\Http\Controllers\dashboard\AppointmentController::class,"store_choose_one_appointment"]);
        });




        Route::group(['prefix' => '/notifications'], function(){
            Route::get('update/{id}', [\App\Http\Controllers\dashboard\NotificationController::class,"update"]);
            //Route::get('ask-for-appointment2/{consultation_id}', [\App\Http\Controllers\dashboard\AppointmentController::class,"ask_for_appointment_by_patient2"]);
           // Route::get('create-choose-one-appointment/{consultation_id}', [\App\Http\Controllers\dashboard\AppointmentController::class,"create_choose_one_appointment"]);
           // Route::post('store-choose-one-appointment', [\App\Http\Controllers\dashboard\AppointmentController::class,"store_choose_one_appointment"]);
        });


        Route::group(['prefix' => '/patients/'], function(){
            Route::get('create', [PatientController::class,"create"])->name("patient.create");;
            Route::post('login', [PatientController::class,"login"])->name("patient.login");
            Route::post('register', [PatientController::class,"register"])->name("patient.register");

            Route::get('password/forgot',[PatientController::class,'showForgotForm'])->name('patient.forgot.password.form');
            Route::post('password/forgot',[PatientController::class,'sendResetLink'])->name('patient.forgot.password.link');
            Route::get('password/reset/{token}/{email}',[PatientController::class,'showResetForm'])->name('patient.reset.password.form');
            Route::post('password/reset',[PatientController::class,'resetPassword'])->name('patient.reset.password');



        });
        Route::group(['prefix' => '/patients/', 'middleware' => ['patient']], function(){
            Route::get('edit', [\App\Http\Controllers\dashboard\PatientController::class,"edit"]);
            Route::post('update', [\App\Http\Controllers\dashboard\PatientController::class,"update"])->name("patient.update");
            Route::get('logout', [\App\Http\Controllers\dashboard\PatientController::class,"logout"]);

            Route::get('/steps', [\App\Http\Controllers\dashboard\PageController::class,"show_steps"]);
            Route::post('/steps', [\App\Http\Controllers\dashboard\PageController::class,"show_steps"]);
            Route::get('/step1', [\App\Http\Controllers\dashboard\PageController::class,"show_step1_payment"]);
            Route::get('/step2', [\App\Http\Controllers\dashboard\PageController::class,"show_step2_ask_for_appointment"]);
            Route::get('/step3', [\App\Http\Controllers\dashboard\PageController::class,"show_step3_choose_one_appointment"]);
            Route::get('/step4', [\App\Http\Controllers\dashboard\PageController::class,"show_step4"]);
            Route::get('/step5', [\App\Http\Controllers\dashboard\PageController::class,"show_step5"]);
            Route::get('/step6', [\App\Http\Controllers\dashboard\PageController::class,"show_step6"]);

            Route::group(['prefix' => '/consultations'], function () {
                Route::get('/open', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_patient_consultations_open"]);
                Route::get('/open/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_patient_consultations_open_in_json"]);
                Route::get('/closed', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_patient_consultations_closed"]);
                Route::get('/closed/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_patient_consultations_closed_in_json"]);

                Route::get('show-report/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_report_for_patient"]);
                Route::get('upload-files/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "upload_files"]);
                Route::get('show-uploaded-files/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_uploaded_files"]);
            });

        });
        Route::prefix('doctors')->group(function () {
            Route::get('/login', [DoctorController::class, 'LoginForm']) ->name('doctor_login');
            Route::post('/login', [DoctorController::class, 'login'])->name('doctor.login') ;
            Route::get('edit-in-site', [DoctorController::class,"edit_in_site"]);
            Route::post('update-in-site', [DoctorController::class,"update_in_site"])->name("doctor.update");
            Route::get('create', [DoctorController::class,"create_in_site"]);
            Route::post('store', [DoctorController::class,"store_in_site"])->name('site.doctor.store');
            Route::get('logout', [DoctorController::class,"logout"])->middleware("doctor");

            Route::get('password/forgot',[DoctorController::class,'showForgotForm'])->name('doctor.forgot.password.form');
            Route::post('password/forgot',[DoctorController::class,'sendResetLink'])->name('doctor.forgot.password.link');
            Route::get('password/reset/{token}/{email}',[DoctorController::class,'showResetForm'])->name('doctor.reset.password.form');
            Route::post('password/reset',[DoctorController::class,'resetPassword'])->name('doctor.reset.password');

        });
        Route::group(['prefix' => 'doctors', 'middleware' => ['doctor']], function(){
            Route::get('/', [DoctorController::class, 'dashboard'])->name('doctor_dashboard'); ;
            Route::get('/dashboard', [DoctorController::class, 'dashboard']) ;


            Route::group(['prefix' => '/consultations'], function () {
                Route::get('/open', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_doctor_consultations_open"]);
                Route::get('/open/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_doctor_consultations_open_in_json"]);
                Route::get('/closed', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_doctor_consultations_closed"]);
                Route::get('/closed/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_doctor_consultations_closed_in_json"]);

              //  Route::get('/', [\App\Http\Controllers\dashboard\ConsultationController::class, "index"]);
               // Route::get('/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_consultations_in_json"]);
               // Route::get('create', [\App\Http\Controllers\dashboard\ConsultationController::class, "create"]);
               // Route::post('store', [\App\Http\Controllers\dashboard\ConsultationController::class, "store"]);
               // Route::get('edit/{id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\ConsultationController::class, "update_by_doctor"]);
                Route::get('create-report/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "create_report"]);
                Route::post('update-report', [\App\Http\Controllers\dashboard\ConsultationController::class, "update_report"]);
               // Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "destroy"]);
                // Route::post('set_accepted', [\App\Http\Controllers\dashboard\ConsultationController::class, "set_accepted"])->name("payment_set_accepted");
                // Route::post('set_accepted', [\App\Http\Controllers\dashboard\ConsultationController::class, "set_accepted"])->name("payment_set_accepted");
                // Route::post('set_unaccepted', [\App\Http\Controllers\dashboard\ConsultationController::class, "set_unaccepted"])->name("payment_set_unaccepted");



                Route::get('show-uploaded-files/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_uploaded_files_for_doctor"]);
            });


        });
        Route::prefix('admins')->group(function () {
            Route::get('/login', [AdminController::class, 'LoginForm']) ->name('admin_login_form');
            Route::post('/login', [AdminController::class, 'login']) ;
            Route::get('/register', [AdminController::class, 'RegisterForm']) ->name('admin_register_form');
            Route::post('/register', [AdminController::class, 'register']);
        });
        Route::group(['prefix' => 'admins', 'middleware' => ['admin']], function(){
            Route::get('/', [AdminController::class, 'dashboard']);
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
            Route::get('/logout', [AdminController::class, "logout"]);
            Route::get('edit/{id}', [AdminController::class,"edit"]);
            Route::post('update', [AdminController::class,"update"]);

            Route::group(['prefix' => '/consultations'], function () {
                Route::get('/', [\App\Http\Controllers\dashboard\ConsultationController::class, "index"]);
                Route::get('/json', [\App\Http\Controllers\dashboard\ConsultationController::class, "get_consultations_in_json"]);

                Route::get('show-report/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_report_for_admin"]);

                Route::get('show-files/{consultation_id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "show_admin_consultations_files"]);
//                Route::get('create', [\App\Http\Controllers\dashboard\ConsultationController::class, "create"]);
//                Route::post('store', [\App\Http\Controllers\dashboard\ConsultationController::class, "store"]);
//                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "edit"]);
//                Route::post('update', [\App\Http\Controllers\dashboard\ConsultationController::class, "update"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\ConsultationController::class, "destroy"]);
               // Route::post('set_accepted', [\App\Http\Controllers\dashboard\ConsultationController::class, "set_accepted"])->name("payment_set_accepted");
               // Route::post('set_unaccepted', [\App\Http\Controllers\dashboard\ConsultationController::class, "set_unaccepted"])->name("payment_set_unaccepted");
            });

            Route::group(['prefix' => '/doctors/'], function(){
                Route::get('', [DoctorController::class,"index"]);
                Route::get('json', [DoctorController::class,"doctors_in_json"]);
                Route::get('create', [DoctorController::class,"create_by_admin"]);
                Route::post('store', [DoctorController::class,"store_by_admin"])->name('doctor.store');
                Route::get('edit/{id}', [DoctorController::class,"edit_by_admin"]);
                Route::post('update', [DoctorController::class,"update_by_admin"]);
                Route::get('destroy/{id}', [DoctorController::class,"destroy"]);
                Route::post('delete-image', [DoctorController::class,"delete_image"]);
              //  Route::get('delete-image1/{id}', [DoctorController::class,"delete_image1"]);
               // Route::get('delete-image2/{id}', [DoctorController::class,"delete_image2"]);


            });
            Route::group(['prefix' => '/patients'], function(){
                Route::get('/', [\App\Http\Controllers\dashboard\PatientController::class,"index"]);
                Route::get('/json', [\App\Http\Controllers\dashboard\PatientController::class,"patients_in_json"]);
//                Route::get('create', [\App\Http\Controllers\dashboard\PatientController::class,"create_dashboard"]);
//                Route::post('store', [\App\Http\Controllers\dashboard\PatientController::class,"store_dashboard"]);
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\PatientController::class,"edit_in_dashboard"]);
                Route::post('update', [\App\Http\Controllers\dashboard\PatientController::class,"update_in_dashboard"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\PatientController::class,"destroy"]);
                Route::post('delete-image', [\App\Http\Controllers\dashboard\PatientController::class,"delete_image"]);
            });
            Route::group(['prefix' => 'specialties/'], function(){
                Route::get('', [\App\Http\Controllers\dashboard\SpecialtyController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\dashboard\SpecialtyController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\SpecialtyController::class,"store"]);
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\SpecialtyController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\SpecialtyController::class,"update"])-> name("category-update");
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\SpecialtyController::class,"destroy"]);
            });
            Route::group(['prefix' => '/admins/'], function(){
                Route::get('', [\App\Http\Controllers\AdminController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\AdminController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\AdminController::class,"store"]);
                Route::get('edit/{id}', [\App\Http\Controllers\AdminController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\AdminController::class,"update"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\AdminController::class,"destroy"]);
            });
            Route::group(['prefix' => '/carousels/'], function(){
                Route::get('', [\App\Http\Controllers\dashboard\CarouselController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\dashboard\CarouselController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\CarouselController::class,"store"])-> name("carousel-store");
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\CarouselController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\CarouselController::class,"update"])-> name("carousel-update");
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\CarouselController::class,"destroy"]);
            });
            Route::group(['prefix' => '/timezones/'], function(){
                Route::get('', [\App\Http\Controllers\dashboard\TimezoneController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\dashboard\TimezoneController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\TimezoneController::class,"store"])-> name("timezone-store");
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\TimezoneController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\TimezoneController::class,"update"])-> name("timezone-update");
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\TimezoneController::class,"destroy"]);
            });
            Route::group(['prefix' => 'services/' ], function(){
                Route::get('', [\App\Http\Controllers\dashboard\ServiceController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\dashboard\ServiceController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\ServiceController::class,"store"]);
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\ServiceController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\ServiceController::class,"update"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\ServiceController::class,"destroy"]);

//                Route::post('upload-file', [\App\Http\Controllers\dashboard\ServiceController::class,"upload_file"]);

            });
            Route::group(['prefix' => 'coupons/' ], function(){
                Route::get('', [\App\Http\Controllers\dashboard\CouponController::class,"index"]);
                Route::get('create', [\App\Http\Controllers\dashboard\CouponController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\CouponController::class,"store"]);
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\CouponController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\CouponController::class,"update"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\CouponController::class,"destroy"]);
            });
            Route::group(['prefix' => '/countries/'], function(){
                Route::get('/', [\App\Http\Controllers\dashboard\CountryController::class,"index"]);
                Route::get('countries_in_json', [\App\Http\Controllers\dashboard\CountryController::class,"countries_in_json"]);
                Route::get('create', [\App\Http\Controllers\dashboard\CountryController::class,"create"]);
                Route::post('store', [\App\Http\Controllers\dashboard\CountryController::class,"store"]);
                Route::get('edit/{id}', [\App\Http\Controllers\dashboard\CountryController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\CountryController::class,"update"]);
                Route::get('destroy/{id}', [\App\Http\Controllers\dashboard\CountryController::class,"destroy"]);
                Route::get('{country_id}', [\App\Http\Controllers\dashboard\CountryController::class,"get_areas_in_country_in_json"]);

            });
            Route::group(['prefix' => '/settings/'], function(){
                Route::get('', [SettingController::class,"edit"]);
                Route::post('update', [SettingController::class,"update"])-> name("settings-update");
            });
            Route::group(['prefix' => '/contacts/'], function(){
                Route::get('', [ContactsController::class,"edit"]);
                Route::post('update', [ContactsController::class,"update"])-> name("contacts-update");
            });
            Route::group(['prefix' => '/whous/'], function(){
                Route::get('', [WhousController::class,"edit"]);
                Route::post('update', [WhousController::class,"update"])-> name("whous-update");
            });
            Route::group(['prefix' => '/videos/'], function(){
                Route::get('', [\App\Http\Controllers\dashboard\VideoController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\VideoController::class,"update"])->name("video-update");
            });
            Route::group(['prefix' => '/privacy-policy/'], function(){
                Route::get('', [PrivacyPolicyController::class,"edit"]);
                Route::post('update', [PrivacyPolicyController::class,"update"])-> name("privacy_policy_update");
            });
            Route::group(['prefix' => '/refund-policy/'], function(){
                Route::get('', [\App\Http\Controllers\dashboard\RefundPolicyController::class,"edit"]);
                Route::post('update', [\App\Http\Controllers\dashboard\RefundPolicyController::class,"update"])->name("refund_policy_update");
            });


            Route::group(['prefix' => '/terms-conditions/'], function(){
                Route::get('', [TermsConditionsController::class,"edit"]);
                Route::post('update', [TermsConditionsController::class,"update"])->name("terms_conditions_update");
            });


//            Route::group(['prefix' => '/disclaimer/'], function(){
//                Route::get('', [\App\Http\Controllers\dashboard\DisclaimerController::class,"edit"]);
//                Route::post('update', [\App\Http\Controllers\dashboard\DisclaimerController::class,"update"]);
//            });






        });
       // Route::get('/', [\App\Http\Controllers\all\PageController::class, "index"]);
    });


