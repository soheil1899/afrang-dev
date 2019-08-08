@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')


    <div dir="ltr" class="shadow-sm container-fluid py-5" style="background-color: #fff;">
        <div class="row mx-0">
            <div class="col-12 order-1 order-lg-0 col-lg-5" style=" padding-top: 60px; padding-left: 60px; ">
                <h3 class="mb-3"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 40px">
                    Our Portfolio
                </h3>
                <div>
                    <p class="team-desc">
                        Undoubtedly the most important factor in any job trust is its team's resume and output. User
                        behavior analysis also shows that the most visited page after the homepage is the portfolio
                        page.
                    </p>
                </div>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img src="/media/test-folder/sample.png" width="100%">
            </div>
        </div>
    </div>




    <our-portfolio></our-portfolio>






@endsection
