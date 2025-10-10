<div class="container" style="margin: 20px;">
    <div class="row">
        <div class="col-md-12">
            <h3  style="text-align: center;color: #0f9bc0;border-bottom:1px solid #0f9bc0;padding:10px;">
                {{ __('site.create_new_appointments') }}
          <span style="font-size: 12px"> [{{ __('site.timezone') }} : {{Auth::guard('doctor')->user()->timezone->name_ar}} {{Auth::guard('doctor')->user()->timezone->utc_offset}}]


          @php
             date_default_timezone_set(Auth::guard('doctor')->user()->timezone->name_en);
             $date =  \Illuminate\Support\Carbon::createFromFormat('F j, Y g:i:a', date('F j, Y g:i:a'));
          // echo($date->format('F j, Y g:i:a')."----".date_default_timezone_get()."-----------".$date->setTimezone('UTC')."------------");
            echo($date->setTimezone(Auth::guard('doctor')->user()->timezone->name_en));



          @endphp
              {{--    //echo($date->format('F j, Y g:i:a')); //  November 27, 2020 11:53:pm--}}


              {{--          $timestamp = '2014-02-06 16:34:00';--}}
              {{--$date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Stockholm');--}}
              {{--$date->setTimezone('UTC');--}}
              {{--          --}}
              {{--          --}}
          </span>
            </h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <form   action="{{url(app()->getLocale()."/doctors/appointments/store-five-appointments")}}"  method="post"  >
                @csrf
                <table class="table ">
                    <thead>
                    <tr class="bgc-info-l3">
                        <th> {{ __('site.patient_name') }}</th>
                        <th>{{ __('site.appointment_one') }}</th>
                        <th>{{ __('site.appointment_two') }}</th>
                        <th> {{ __('site.appointment_three') }}</th>
                        <th> {{ __('site.appointment_four') }}</th>
                        <th> {{ __('site.appointment_five') }}</th>
                        <th> {{ __('site.save') }}</th>
                    </tr>

                    <script>
                        $(document).ready(function() {
                            $('.cc').appendDtpicker({
                                "current":null,
                                "autodateOnStart": false,
                                "locale":"en",


                            });
                        });
                    </script>

                    <input type="hidden" name="patient_id" value="{{@$consultation->patient->id}}">
                    </thead>
                            <tr>
                                  <input type="hidden" name="appointment_id" value="{{@$consultation->appointment->id}}" class="btn btn-sm btn-light-info " >
                                <td>{{@$consultation->patient->name}}</td>
                                <td><input type="text" name="appointment1" value="" class="btn btn-sm btn-light-info cc " required autocomplete="off"></td>
                                <td><input type="text" name="appointment2" value="" class="btn btn-sm btn-light-info cc" required autocomplete="off"></td>
                                <td><input type="text" name="appointment3" class="btn btn-sm btn-light-info cc" required autocomplete="off"></td>
                                <td><input type="text" name="appointment4" class="btn btn-sm btn-light-info cc" autocomplete="off" ></td>
                                <td><input type="text" name="appointment5" class="btn btn-sm btn-light-info cc" autocomplete="off"></td>
                                <td>
                                    <input type="submit" value="{{ __('site.send') }}" class="btn btn-light-success btn-sm btn-h-light-info btn-a-light-primary fs--outline"></td>
                            </tr>



                </table>
            </form>

        </div>
    </div>
</div>
