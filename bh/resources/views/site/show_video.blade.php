@extends('layouts.site.master')

@section('breadcrumb')
@endsection

@section('content')

    <div class='row' style="padding: 20px">
        <div class="col-md-12" >
            <div id="abc123" style="width: 100%;height: 540px;margin: auto;text-align: center;">
                {{ __('site.the_video_is_uploading_please_wait') }}
            </div>
        </div>


    </div>
    @if( Auth::guard('patient')->check())
    <div class='row' style="padding: 20px">
    <div class="col-md-12" >
        <div  style="margin: auto;text-align: center;">
            <a href="{{url(app()->getLocale()."/patients/steps#step-5")}}" id="continue_btn" class="btn btn-smd btn-light-info col-md-2 font-bolder letter-spacing-1 mb-2px">      {{ __('site.back_to_steps') }}  </a>
        </div>
    </div>
    </div>
    @endif

    @if( Auth::guard('doctor')->check())
        <div class='row' style="padding: 20px">
            <div class="col-md-12" >
                <div  style="margin: auto;text-align: center;">
                    <a href="{{url(app()->getLocale()."/doctors/consultations/open")}}" id="continue_btn" class="btn btn-smd btn-light-info col-md-2 font-bolder letter-spacing-1 mb-2px"> {{ __('site.back_to_open_consultations') }}</a>
                </div>
            </div>
        </div>
    @endif
    <script>var exports = {};</script>
    {{--<script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.3.31/rtc-js-prebuilt.js"></script>--}}

    {{--<script>var exports = {};</script>--}}
    <script src="{{ asset('all/js/rtc-js-prebuilt.js')}}"></script>
    <script>
        // Initialize the factory function   <script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.1.1/rtc-js-prebuilt.js">
        const meeting = new VideoSDKMeeting();

        // Set apikey, meetingId and participant name
        //const apiKey = "<API KEY>"; // generated from app.videosdk.live
        // const apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcGlrZXkiOiIwMjUxZjkzNC0yYThmLTQyYjAtOTA1Yy03NjUxOTcyZWYwZTkiLCJwZXJtaXNzaW9ucyI6WyJhbGxvd19qb2luIl0sImlhdCI6MTY5NzM0ODMwOSwiZXhwIjoxNzI4ODg0MzA5fQ.lg_ki6QmBWdZA3f7fhaTwFRMEckeFSOpOAP0xL3dotE";
        const apiKey ="0251f934-2a8f-42b0-905c-7651972ef0e9";
                     //  0251f934-2a8f-42b0-905c-7651972ef0e9
        //const meetingId = "milkyway";
        {{--//const meetingId = "{{ @Auth::guard('patient')->user()->name}}-{{ @Auth::guard('patient')->user()->id}}";--}}
        const meetingId = "{{$consultation_video_id}}";
        const name = " {{ @Auth::guard('patient')->user()->name}}";

        const config = {
            whiteboardEnabled: false,
            videoConfig: {
                resolution: "h1080p_w1920p", // h720p_w1280p h360p_w640p, h540p_w960p, h1080p_w1920p
                optimizationMode: "motion", // text , detail
                multiStream: true,
            },
            permissions: {
                //other permissions
                pin: false,
                askToJoin: false,
                toggleParticipantWebcam: true,
                toggleParticipantMic: true,
                toggleParticipantMode: true,
                canCreatePoll: true,
                canToggleParticipantTab: true,
                toggleParticipantScreenshare: true,
                removeParticipant: true,
                endMeeting: true,
                drawOnWhiteboard: true,
                toggleWhiteboard: true,
                toggleVirtualBackground: false,
                toggleRecording: true,
                toggleLivestream: false,
                changeLayout: false,
                //changeLayout: true,
            },
            layout: {
                type: "SPOTLIGHT", // "SPOTLIGHT" | "SIDEBAR" | "GRID"
                priority: "PIN", // "SPEAKER" | "PIN",
                gridSize: 2,
            },
            waitingScreen: {
                //imageUrl: "<imageUrl || lottieUrl>",
                imageUrl: "{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}",
                text: "Connecting to the meeting...",
            },
            name: name,
            apiKey: apiKey,
            meetingId: meetingId,

            maxResolution: "hd", // "sd" or "hd"

            containerId: "abc123",
            // redirectOnLeave: "https://www.askourdoctor.com/patients/step-6",
            //  redirectOnLeave: "http://127.0.0.1:8000/ar/patients/steps#step-6",

            micEnabled: true,
            webcamEnabled: true,
            participantCanToggleSelfWebcam: true,
            participantCanToggleSelfMic: true,

            chatEnabled: true,
            screenShareEnabled: false,
            pollEnabled: false,
            whiteBoardEnabled: false,
            raiseHandEnabled: false,

            recordingEnabled: false,
            recordingWebhookUrl: "https://www.videosdk.live/callback",
            participantCanToggleRecording: false,

            brandingEnabled: true,
            brandLogoURL: "{{asset(Config::get('app.upload'))}}/{{ $settings->{'logo_'.app()->getLocale()} }}",
            brandName: "Askourdoctor.com",


            theme: "DARK", // DARK || LIGHT || DEFAULT

            joinScreen: {
                visible: false,
                title: "Daily scrum",
                // meetingUrl: "customURL.com",
            },
        };

        meeting.init(config);
    </script>






@endsection
