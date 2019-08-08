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
                    About Afrang
                </h3>
                <div>
                    <p class="team-desc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias, dignissimos non quod
                        repellat
                        rerum veritatis! Asperiores esse asperiores esse id nostrum ut? Dignissimos necessitatibus
                        repellat sint! Et
                        ipsum
                        omnis sit! Cupiditate.
                    </p>
                </div>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img src="/media/test-folder/team.jpg" width="100%">
            </div>
        </div>
    </div>





    {{--  Section works  --}}
    <div style="padding-top: 150px; padding-bottom: 150px; background-color: #f1f3f5" class="shadow-sm" dir="ltr">
        <div class="container text-center">
            <h3 class="mb-5"
                style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 35px">
                WE PROMOTE YOUR BUSINESS
            </h3>
            <div class="row pt-4">
                <div class="col-12 col-lg-5">
                    <img src="/media/test-folder/aboutus.jpg" width="100%" style="box-shadow: 0 0 10px 2px #b2b457">
                </div>
                <div class="col-12 pt-5 pt-lg-0 col-lg-7 px-5 text-left">

                    <div class="mb-5">
                        <h5 class="mb-3 pb-1"
                            style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #5879ec">
                            Our Mission
                        </h5>
                        <p class="team-desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam aliquid amet
                            assumenda distinctio, eos esse, impedit inventore, labore nostrum numquam
                            quo repellat similique unde veritatis voluptate?
                        </p>
                    </div>
                    <div class="mb-5">
                        <h5 class="mb-3 pb-1"
                            style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #028c32">
                            Our Vision
                        </h5>
                        <p class="team-desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam aliquid amet
                            assumenda distinctio, eos esse, impedit inventore, labore nostrum numquam
                            quo repellat similique unde veritatis voluptate?
                        </p>
                    </div>
                    <div class="mb-5">
                        <h5 class="mb-3 pb-1"
                            style="font-family: Rambla; font-weight: bold; color: #222222; font-size: 20px; width: fit-content; border-bottom: 2px solid #e84a60">
                            Our Redline
                        </h5>
                        <p class="team-desc">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam aliquid amet
                            assumenda distinctio, eos esse, impedit inventore, labore nostrum numquam
                            quo repellat similique unde veritatis voluptate?
                        </p>
                    </div>


                </div>
            </div>
        </div>


    </div>










@endsection
