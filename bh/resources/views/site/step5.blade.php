
    <div class='row'>
        <div class="col-md-12" >
            <div id="dd" style="width: 100%;height: 540px;margin: auto;text-align: center;">

                {{ __('site.the_video_is_uploading_please_wait') }}

            </div>
        </div>
    </div>


{{--            <script>var exports = {};</script>--}}
{{--            <script src="{{ asset('all/js/rtc-js-prebuilt.js')}}"></script>--}}
{{--            <script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.3.31/rtc-js-prebuilt.js"></script>--}}
    <script src="{{ asset('all/js/rtc-js-prebuilt.js')}}"></script>
            <script>
                // Initialize the factory function   <script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.1.1/rtc-js-prebuilt.js">


                // Set apikey, meetingId and participant name
                //const apiKey = "<API KEY>"; // generated from app.videosdk.live
                // const apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcGlrZXkiOiIwMjUxZjkzNC0yYThmLTQyYjAtOTA1Yy03NjUxOTcyZWYwZTkiLCJwZXJtaXNzaW9ucyI6WyJhbGxvd19qb2luIl0sImlhdCI6MTY5NzM0ODMwOSwiZXhwIjoxNzI4ODg0MzA5fQ.lg_ki6QmBWdZA3f7fhaTwFRMEckeFSOpOAP0xL3dotE";
                const apiKey ="0251f934-2a8f-42b0-905c-7651972ef0e9";
                //const meetingId = "milkyway";
                {{--//const meetingId = "{{ @Auth::guard('patient')->user()->name}}-{{ @Auth::guard('patient')->user()->id}}";--}}
                const meetingId = "{{session("the_consultation_id")}}";
                const name = " {{ @Auth::guard('patient')->user()->name}}";

                const config = {
                    whiteboardEnabled: true,
                    videoConfig: {
                        resolution: "h1080p_w1920p", // h720p_w1280p h360p_w640p, h540p_w960p, h1080p_w1920p
                        optimizationMode: "motion", // text , detail
                        multiStream: false,
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
                        drawOnWhiteboard: false,
                        toggleWhiteboard: false,
                        toggleVirtualBackground: false,
                        toggleRecording: true,
                        toggleLivestream: false,
                        changeLayout: false,
                        //changeLayout: true,
                    },
                    layout: {
                        // type: "SIDEBAR", // "SPOTLIGHT" | "SIDEBAR" | "GRID"
                        // priority: "PIN", // "SPEAKER" | "PIN",
                        // gridSize: 3,
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

                    containerId: "dd",
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
                const meeting = new VideoSDKMeeting();
                meeting.init(config);
            </script>







<style>.jsPanel{z-index: 100000 !important;}</style>
<script>
    $(document).ready(function(){


    });

</script>

<script >
    $(document).ready(function () {

    });
</script>


