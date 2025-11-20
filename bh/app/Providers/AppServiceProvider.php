<?php

namespace App\Providers;

use App\Http\Controllers\dashboard\ContactsController;
use App\Models\Carousel;
use App\Models\Contact;
use App\Models\Notification;
use App\Models\Service;
use App\Models\Settings;
use App\Models\Specialty;
use App\Models\WhousModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // تأكد أن استعلامات قاعدة البيانات لا تنفذ أثناء أوامر artisan (كأوامر الكاش)
        if (!app()->runningInConsole()) {

            $contacts= Contact::first();
            View::share('contacts', $contacts);

            $services = Service::orderBy('record_order', 'asc')->get();
            View::share('services', $services);

            $specialties = Specialty::orderBy('record_order', 'asc')->get();
            View::share('specialties', $specialties);

            $whous = WhousModel::first();
            View::share('whous', $whous);

            $settings = Settings::first();
            View::share('settings', $settings);

            $last_services = Service::orderBy('record_order', 'asc')->limit(10)->get();
            View::share('last_services', $last_services);

            view()->composer('*', function ($view)
            {
                if (Auth::guard('patient')->check()) {
                    $patient_notes= Notification::where('to','patient')
                        ->where('patient_id',@Auth::guard('patient')->user()->id)
                        ->where('read',"no")
                        ->orderBy('id', 'desc')
                        ->get();
                    View::share('patient_notes', $patient_notes);
                }

                if (Auth::guard('doctor')->check()) {
                    $doctor_notes= Notification::where('to','doctor')
                        ->where('doctor_id',@Auth::guard('doctor')->user()->id)
                        ->where('read',"no")
                        ->orderBy('id', 'desc')
                        ->get();
                    View::share('doctor_notes', $doctor_notes);
                }
            });

        }
    }
}
