




<div class="container" style="margin-top: 30px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif">

    <div class='row btn-h-lighter-info'  style="margin: 2px" >
        <div class='col-md-4'>
            <label class="font-bold"> {{ __('site.name') }}    : </label>
        </div>
        <div class='col-md-8'>
            {{$doctor->name}}
        </div>
    </div>
    <div class='row btn-h-lighter-info'  style="margin: 2px" >
        <div class='col-md-4'>
            <label class="font-bold"> {{ __('site.specialty') }}    : </label>
        </div>
        <div class='col-md-8'>
            {{@$doctor->specialty->{"name_".app()->getLocale()} }}
        </div>
    </div>
    <div class='row btn-h-lighter-info'  style="margin: 2px" >
        <div class='col-md-4'>
            <label class="font-bold"> {{ __('site.current_place_of_work') }}  : </label>
        </div>
        <div class='col-md-8'>
            {{@$doctor->place_of_work }}
        </div>
    </div>
    <div class='row btn-h-lighter-info'  style="margin: 2px" >
        <div class='col-md-4'>
            <label class="font-bold"> {{ __('site.years_of_experience') }}   : </label>
        </div>
        <div class='col-md-8'>
            {{@$doctor->years_of_experience }}
        </div>
    </div>
    <div class='row btn-h-lighter-info'  style="margin: 2px" >
        <div class='col-md-4'>
            <label class="font-bold"> {{ __('site.doctor_details') }}   : </label>
        </div>
        <div class='col-md-8'>
            {!! @$doctor->{"details_".app()->getLocale()} !!}
        </div>
    </div>
</div>


