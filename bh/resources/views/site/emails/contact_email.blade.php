<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        p {
            font-size: 12px;
        }

    </style>
</head>
<body>
<h2>Hello, It's me {{ $content->name }}</h2>
<br>


<strong>Name: </strong>{{ $content->name }} <br>
<strong>Subject: </strong>{{ $content->subject }} <br>
<strong>Mobile: </strong>{{ $content->mobile }} <br>
<strong>Email: </strong>{{ $content->email }} <br>
<strong>Message: </strong>{{ $content->message }} <br><br>
Thank you
</body>
</html>
