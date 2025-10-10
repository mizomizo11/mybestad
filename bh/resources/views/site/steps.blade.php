@extends('layouts.site.master')
@section('breadcrumb')
@endsection
@section('content')

    <div class="container" style="margin: 10px;direction:@if(App()->getLocale() == 'ar') rtl @else ltr  @endif ;text-align:@if(App()->getLocale() == 'ar') right @else left @endif" >
        <div class="row" style="border-radius: 8px;padding: 10px;background-color: #e1f2f8 !important">
            <div class="col-md-4">
                <h5  >{{ __('site.patient_name') }} :  {{ @Auth::guard('patient')->user()->name}}</h5>
            </div>
            <div class="col-md-4">
                <h5  >{{ __('site.doctor_name') }} :   {{session("the_doctor_name")}}</h5>
            </div>
            <div class="col-md-4">
                <h5  >{{ __('site.specialty') }} :  {{session("the_specialty_name")}}    </h5>
            </div>
        </div>
    </div>

    <!-- SmartWizard html -->
    <div id="smartwizard" dir=@if(App::getLocale() == 'ar') rtl @else ltr @endif   >
        <ul class="nav nav-progress">

            <li class="nav-item">
                <a class="nav-link" href="#step-1" data-repo="step1">
                    <span class="num" style="padding-top: 5px">1</span>
                    {{ __('site.payment') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-2" data-repo="step2">
                    <span class="num" style="padding-top: 5px">2</span>
                  {{ __('site.ask_for_appointment') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-3" data-repo="step3">
                    <span class="num" style="padding-top: 5px">3</span>
                     {{ __('site.confirm_appointment') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-4" data-repo="step4">
                    <span class="num" style="padding-top: 5px">4</span>
                         {{ __('site.attach_files') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#step-5" data-repo="step5">
                    <span class="num" style="padding-top: 5px">5</span>
                    {{ __('site.enter_video') }}
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#step-6" data-repo="step6">
                    <span class="num" style="padding-top: 5px">6</span>
                    {{ __('site.finish') }}
                </a>
            </li>
        </ul>
        <style>.tab-content{
                height: auto !important;
            }
        </style>
        <div class="tab-content">
            <div id="step-1" class="tab-pane" role="tabpanel" aria-labelledby="step-1">
                <h3>1</h3>
                Fallback content
            </div>
            <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                Fallback content
            </div>
            <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                Fallback content
            </div>
            <div id="step-4" class="tab-pane" role="tabpanel" aria-labelledby="step-4">
                Fallback content
            </div>
            <div id="step-5" class="tab-pane" role="tabpanel" aria-labelledby="step-5">
                <h3>5</h3>
            </div>
            <div id="step-6" class="tab-pane" role="tabpanel" aria-labelledby="step-6">
                <h3>Thank you!</h3>
                <small class="text-muted">This content is static</small>
            </div>
        </div>

        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>



    <br /> &nbsp;
    </div>



    <script type="text/javascript">
        //function onFinish(){ alert('Finish Clicked'); }
        function onCancel(){ $('#smartwizard').smartWizard("reset"); }
        function provideContent(idx, stepDirection, stepPosition, selStep, callback) {
            // Only get ajax content on the forward movement
           // if (stepDirection === 'forward' && stepPosition === 'middle') {
                let repo    = selStep.data('repo');
                 //let repo = "jquery-smartwizard";
                let ajaxURL = "{{url(app()->getLocale())}}/patients/" + repo;
                // Ajax call to fetch your content
                $.ajax({
                    method  : "GET",
                    type:'html',
                    url     : ajaxURL,
                    beforeSend: function( xhr ) {
                        // Show the loader
                        $('#smartwizard').smartWizard("loader", "show");
                    }
                }).done(function( data ) {
                  //  let data = res.results[0];
                   // console.log(data);

                    callback(data);

                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");
                }).fail(function(err) {
                    // Reject the Promise with error message to show as tab content
                    callback( "An error loading the resource" );

                    // Hide the loader
                    $('#smartwizard').smartWizard("loader", "hide");
                });
          //  }

            callback();
        }

        $(function() {

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepIndex, stepDirection, stepPosition) {
                $("#prev-btn").removeClass('disabled').prop('disabled', false);
                $("#next-btn").removeClass('disabled').prop('disabled', false);
                if(stepPosition === 'first') {
                    $("#prev-btn").addClass('disabled').prop('disabled', true);
                } else if(stepPosition === 'last') {
                    $("#next-btn").addClass('disabled').prop('disabled', true);
                } else {
                    $("#prev-btn").removeClass('disabled').prop('disabled', false);
                    $("#next-btn").removeClass('disabled').prop('disabled', false);
                }
                // Get step info from Smart Wizard
                let stepInfo = $('#smartwizard').smartWizard("getStepInfo");
                $("#sw-current-step").text(stepInfo.currentStep + 1);
                $("#sw-total-step").text(stepInfo.totalSteps);
            });

            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                showStepURLhash: true,
                theme: 'square', // basic, arrows, square, round, dots
                transition: {
                    animation:'fade' // none|fade|slideHorizontal|slideVertical|slideSwing|css
                },
                toolbar: {
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    position: 'bottom', // none/ top/ both / bottom
                    extraHtml: `<button class="btn btn-secondary" onclick="onCancel()">{{ __('site.cancel') }}</button>`
                  //   extraHtml: `<button class="btn btn-success" onclick="onFinish()">إنهاء</button>
                  //             <button class="btn btn-secondary" onclick="onCancel()">إلغاء</button>`
                },
                anchor: {
                    enableNavigation: true, // Enable/Disable anchor navigation
                    enableNavigationAlways: false, // Activates all anchors clickable always
                    enableDoneState: true, // Add done state on visited steps
                    markPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    unDoneOnBackNavigation: false, // While navigate back, done state will be cleared
                    enableDoneStateNavigation: true // Enable/Disable the done state navigation
                },
                disabledSteps: [], // Array Steps disabled
                errorSteps: [], // Highlight step with errors
                hiddenSteps: [], // Hidden steps
                getContent: provideContent,
                lang: { // Language variables for button
                    next: '{{ __('site.next') }}',
                    previous: '{{ __('site.previous') }}',
                    cancel: '{{ __('site.cancel') }}',
                },
            });

            $("#state_selector").on("change", function() {
                $('#smartwizard').smartWizard("setState", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

            $("#style_selector").on("change", function() {
                $('#smartwizard').smartWizard("setStyle", [$('#step_to_style').val()], $(this).val(), !$('#is_reset').prop("checked"));
                return true;
            });

        });
    </script>

@endsection




