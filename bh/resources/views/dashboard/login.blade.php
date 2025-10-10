<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ask our Doctor  </title>

    <link rel="stylesheet" type="text/css" href="{{ asset('all/css/bootstrap.min.css')}}">
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>--}}
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>--}}
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />--}}

    <style>
        .error {
            color: red
        }
    </style>
</head>
<body >


<div class="container">
    <div class="row" style="margin-top: 200px; ">
        <div class="col-lg-5  " style="margin: auto;color:#000;border:0px">




        <div  style="border:0px">
            <img src="{{asset('/all/img/logo.jpg')}}" style="width: 100%;">
        </div>



    </div>
    <div class="col-lg-7  " style="margin: auto;;color:#000">

        <!-- form card login -->
        <div class="card " >
            <div class="card-header" >
                <h3 style="color: #df424c;"> لوحة التحكم
                </h3>
            </div>
            <div class="card-body" >



                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <form action="{{url(app()->getLocale().'/dashboard/login')}}" class="form" role="form" autocomplete="off"  novalidate="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label  style="color: #df424c;">Email or Mobile</label>
                        <input type="text" class="form-control form-control-lg rounded-0" name="email"  required="">

                    </div>
                    <div class="form-group">
                        <label style="color: #df424c;">Password</label>
                        <input type="password" class="form-control form-control-lg rounded-0" name="password"  required="" >

                    </div>
                    <div>
                        <label class="custom-control custom-checkbox">

                        </label>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-lg float-right" id="btnLogin">Login</button>
                </form>
            </div>
            <!--/card-block-->
        </div>
        <!-- /form card login -->



    </div>
    <!--/col-->
</div>
<!--/row-->
</div>















</body>

</html>








