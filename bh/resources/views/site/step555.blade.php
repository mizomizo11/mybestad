{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8" />--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" />--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0" />--}}
{{--    <title>Videosdk.live RTC</title>--}}
{{--</head>--}}
{{--<body>--}}

{{--<i class=' account_number_open_modal_btn color_red' id="account_number_open_modal_btn"--}}
{{--   style='font-size:15px;font-weight: bold'>Accounts</i></a>--}}

{{--<script>--}}
{{--    $(document).on('click', '.account_number_open_modal_btn', function(e) {--}}
{{--        var idd = $(this).attr("data-id");--}}
{{--        var panel = jsPanel.create({--}}
{{--            theme: 'info',--}}
{{--            borderRadius: '5px',--}}
{{--            //headerLogo: '<i class="fad fa-home-heart ml-2"></i>',--}}
{{--            headerTitle: 'حسابات العملاء',--}}
{{--            //headerToolbar: '',--}}
{{--            headerLogo: "<span class='fa fa-spinner fa-spin ml-2 '></span>",--}}
{{--            footerToolbar: '',--}}
{{--            panelSize: {--}}
{{--                width: () => {--}}
{{--                    return Math.min(800, window.innerWidth * 0.9);--}}
{{--                },--}}
{{--                height: () => {--}}
{{--                    return Math.min(800, window.innerHeight * 0.9);--}}
{{--                }--}}
{{--            },--}}
{{--            position: 'center 0 -50',--}}
{{--            //animateIn: 'jsPanelFadeIn',--}}
{{--            contentAjax: {--}}
{{--                method: 'get',--}}

{{--                url: "/en/show_video",--}}
{{--                data: "id=" + idd, // note that data type is set with setRequestHeader()--}}
{{--                beforeSend: function() {--}}
{{--                    this.setRequestHeader('Content-Type',--}}
{{--                        'application/x-www-form-urlencoded');--}}
{{--                },--}}
{{--                done: (xhr, panel) => {--}}
{{--                    // panel.content.innerHTML = xhr.responseText;--}}
{{--                    panel.contentRemove();--}}
{{--                    panel.content.append(jsPanel.strToHtml(xhr.responseText));--}}
{{--                    $('.fa-spinner').hide();--}}
{{--                    //Prism.highlightAll();--}}
{{--                }--}}
{{--            },--}}
{{--            //onwindowresize: true,--}}

{{--        });--}}

{{--    });--}}

{{--</script>--}}

<script>
    // Initialize the factory function   <script src="https://sdk.videosdk.live/rtc-js-prebuilt/0.1.1/rtc-js-prebuilt.js">
    const meeting = new VideoSDKMeeting();

    // Set apikey, meetingId and participant name
    //const apiKey = "<API KEY>"; // generated from app.videosdk.live
    // const apiKey = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcGlrZXkiOiIwMjUxZjkzNC0yYThmLTQyYjAtOTA1Yy03NjUxOTcyZWYwZTkiLCJwZXJtaXNzaW9ucyI6WyJhbGxvd19qb2luIl0sImlhdCI6MTY5NzM0ODMwOSwiZXhwIjoxNzI4ODg0MzA5fQ.lg_ki6QmBWdZA3f7fhaTwFRMEckeFSOpOAP0xL3dotE";
    const apiKey ="0251f934-2a8f-42b0-905c-7651972ef0e9";
    const meetingId = "milkyway";
    const name = "John Doe";

    const config = {
        name: name,
        apiKey: apiKey,
        meetingId: meetingId,

        visible: true,
        title: "Daily scrum",
        meetingUrl: "customURL.com",

        containerId: null,
        redirectOnLeave: "http://127.0.0.1:8000/ar/steps/1#step-6",

        micEnabled: true,
        webcamEnabled: true,
        participantCanToggleSelfWebcam: true,
        participantCanToggleSelfMic: true,

        chatEnabled: false,
        screenShareEnabled: false,
        pollEnabled: false,
        whiteBoardEnabled: false,
        raiseHandEnabled: true,

        recordingEnabled: false,
        recordingWebhookUrl: "https://www.videosdk.live/callback",
        participantCanToggleRecording: false,

        brandingEnabled: false,
        brandLogoURL: "https://picsum.photos/200",
        brandName: "Awesome startup",
    };

    meeting.init(config);
</script>
