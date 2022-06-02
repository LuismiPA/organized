@extends('plantilla')

@section('title')
    Página principal
@endsection

@section('csspropio')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
@endsection

@section('principal')
    <div class="main">
        <div class="container mx-auto">
            <div class="middle">
                <div id="login">

                    <form action="javascript:void(0);" method="get">

                        <fieldset class="clearfix">

                            <p><span class="fa fa-user"></span><input type="text" Placeholder="Username" required>
                            </p> <!-- JS because of IE support; better: placeholder="Username" -->
                            <p><span class="fa fa-lock"></span><input type="password" Placeholder="Password" required>
                            </p> <!-- JS because of IE support; better: placeholder="Password" -->

                            <div>
                                <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text"
                                        href="#">Forgot
                                        password?</a></span>
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit"
                                        value="Sign In"></span>
                            </div>

                        </fieldset>
                        <div class="clearfix"></div>
                    </form>

                    <div class="clearfix"></div>

                </div> <!-- end login -->
                <div class="logo">
                    <img src="{{ asset('assets/images/logo_trans.png') }}" alt="logo">
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>

    </div>
@endsection