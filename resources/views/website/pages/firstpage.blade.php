@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')





    {{--    <div dir="ltr" class="position-relative shadow-sm"--}}
    {{--         style="width: 100%; height: auto; display: block; padding-bottom: 130px">--}}
    {{--        <div class="stripes-container">--}}
    {{--            <div class="stripe"></div>--}}
    {{--            <div class="stripe"></div>--}}
    {{--            <div class="stripe"></div>--}}
    {{--            <div class="stripe"></div>--}}
    {{--            <div class="stripe"></div>--}}
    {{--        </div>--}}


    {{--        <h1 class="text-center pt-5" style="text-shadow: 0 0 2px">--}}
    {{--            <strong>--}}
    {{--                Create Your Own Business--}}
    {{--            </strong>--}}
    {{--        </h1>--}}
    {{--        <h3 class="text-center pb-4" style="text-shadow: 0 0 2px; color: #0a9234">--}}
    {{--            <i>--}}
    {{--                <strong>--}}
    {{--                    Special Offer for Summer--}}
    {{--                </strong>--}}
    {{--            </i>--}}
    {{--        </h3>--}}


    {{--        <img src="/media/test-folder/banner.png" width="60%" class="d-block mx-auto">--}}


    {{--    </div>--}}


    <div dir="ltr" class="shadow-sm container-fluid"
         style="padding-top: 60px; padding-bottom: 100px;background-color: #fff;">
        <div class="row mx-0">
            <div class="col-12 order-1 order-lg-0 col-lg-5" style=" padding-top: 60px; padding-left: 60px; ">
                <h3 class="mb-5 text-center text-lg-left"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #222222; font-size: 40px">
                    CREATE YOUR OWN BUSINESS
                </h3>
                <h3 class="mb-3 text-center text-lg-left"
                    style="font-family: Rambla; font-weight: bold; text-shadow: 0 0 1px; color: #1b75bb; font-size: 25px">
                    Special Offer For Summer
                </h3>
                <a class="text-center text-lg-left d-block">
                    <button style="font-family: ACME;" type="button"
                            class="btn btn-lg btn-outline-primary">
                        <i class="far fa-hand-point-right"></i>
                        Order Now
                    </button>
                </a>
            </div>
            <div class="col-12 order-0 order-lg-1 col-lg-7">
                <img src="/media/test-folder/banner.png" width="100%">
            </div>
        </div>
    </div>



    {{--  Section works  --}}
    <div style="padding-top: 150px; padding-bottom: 150px; background-color: #f1f3f5" class="shadow-sm" dir="ltr">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5 mb-lg-0 col-md-4 px-5 text-center">
                    <div class="pb-4 row m-0 d-block text-center">
                        <img style="opacity: 0.9" src="/media/test-folder/website.png" width="70%">
                    </div>
                    <div class="row m-0 d-block text-center">
                        <h4><strong>
                                Website
                            </strong></h4>
                        <p>
                            Lorem ipsum dolor sit amet, iudicabit pertinacia cu per, iudico aliquip imperdiet eos ex. Ut
                            has ludus tantas quaeque.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 mb-lg-0 px-5 text-center">
                    <div class="row pb-4 m-0 d-block text-center">
                        <img style="opacity: 0.9" src="/media/test-folder/application.png" width="70%">
                    </div>
                    <div class="row m-0 d-block text-center">
                        <h4><strong>
                                Application
                            </strong></h4>
                        <p>
                            Lorem ipsum dolor sit amet, iudicabit pertinacia cu per, iudico aliquip imperdiet eos ex. Ut
                            has ludus tantas quaeque.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4 px-5 text-center">
                    <div class="row pb-4 m-0 d-block text-center">
                        <img src="/media/test-folder/startup.png" style="border-radius: 50%; opacity: 0.8" width="70%">
                    </div>
                    <div class="row m-0 d-block text-center">
                        <h4><strong>
                                Startup
                            </strong></h4>
                        <p>
                            Lorem ipsum dolor sit amet, iudicabit pertinacia cu per, iudico aliquip imperdiet eos ex. Ut
                            has ludus tantas quaeque.
                        </p>
                    </div>
                </div>
            </div>
        </div>


    </div>




    {{--  Section options  --}}
    <div dir="ltr" style="padding-top: 150px; padding-bottom: 150px;" class="row shadow-sm px-5 mx-0">

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-shopping-cart fa-3x mb-4"></i>
                <h5><strong>
                        Online Store
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-satellite-dish fa-3x mb-4"></i>
                <h5><strong>
                        News
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-home fa-3x mb-4"></i>
                <h5><strong>
                        Real Estate Advisor
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-stethoscope fa-3x mb-4"></i>
                <h5><strong>
                        Reservation of medical services
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-hotel fa-3x mb-4"></i>
                <h5><strong>
                        Hotel
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-microscope fa-3x mb-4"></i>
                <h5><strong>
                        Scientific & Educational
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-ad fa-3x mb-4"></i>
                <h5><strong>
                        Online Advertising
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-plane fa-3x mb-4"></i>
                <h5><strong>
                        Travel Agency
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-chalkboard-teacher fa-3x mb-4"></i>
                <h5><strong>
                        Educational Institution
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-palette fa-3x mb-4"></i>
                <h5><strong>
                        Decoration Company
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-hospital fa-3x mb-4"></i>
                <h5><strong>
                        Hospital
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-utensils fa-3x mb-4"></i>
                <h5><strong>
                        Online Food Ordering
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-ship fa-3x mb-4"></i>
                <h5><strong>
                        Business & Trading
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-cog fa-3x mb-4"></i>
                <h5><strong>
                        Manufacturer
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fab fa-itunes-note fa-3x mb-4"></i>
                <h5><strong>
                        Cultural & Artistic
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-book fa-3x mb-4"></i>
                <h5><strong>
                        Book Publishing
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-cut fa-3x mb-4"></i>
                <h5><strong>
                        Makeup & Trimming
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-torii-gate fa-3x mb-4"></i>
                <h5><strong>
                        Tourism
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-running fa-3x mb-4"></i>
                <h5><strong>
                        Sport Club
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="far fa-comments fa-3x mb-4"></i>
                <h5><strong>
                        Social Networks
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="far fa-play-circle fa-3x mb-4"></i>
                <h5><strong>
                        Multimedia
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-camera-retro fa-3x mb-4"></i>
                <h5><strong>
                        Photo Studio
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-download fa-3x mb-4"></i>
                <h5><strong>
                        Download
                    </strong></h5>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 text-center p-2">
            <div style="height: 100%; border-radius: 5px" class="shadow-sm pointer work-option p-3">
                <i class="fas fa-briefcase fa-3x mb-4"></i>
                <h5><strong>
                        Recruitment
                    </strong></h5>
            </div>
        </div>


    </div>


    {{--  Section aboutus  --}}
    <div style="padding-top: 150px; padding-bottom: 150px;background-color: #f1f3f5" class="shadow-sm" dir="ltr">
        <div class="container text-center">
            <div style="width: fit-content" class="mx-auto px-3">
                <img src="/media/test-folder/sitelogo.png" class="mb-5" width="100%">
            </div>
            <div class="px-5">
                <p style="font-size: 15px">
                    Lorem ipsum dolor sit amet, ei dicant commune eos, probo noluisse molestiae vel ei. Ius praesent
                    theophrastus eu. Ea his labores placerat fabellas, nulla primis at his, veri impetus mentitum ea
                    duo. At
                    eos sumo incorrupte, odio legendos ut sea. No vim alterum officiis, vivendum insolens contentiones
                    ex
                    mel, at usu possim corpora efficiantur. Duo affert eligendi at, modo maiorum eos id, ei pro eripuit
                    legimus.
                </p>
                <p>
                    Pro consul petentium an. Ne nobis vocibus mel. Eu euismod commune signiferumque per. Ex consequat
                    efficiendi qui, nam et exerci consul fastidii.
                </p>
            </div>

        </div>

    </div>


    {{--  Section team  --}}
    <div style="padding-bottom: 150px; padding-top: 150px;" class="shadow-sm" dir="ltr">
        <div class="container">
            <div class="row m-0 justify-content-around">


                <div class="team-info col-6 col-lg-3 p-3 text-center">
                    <div class="mx-auto" style="width: fit-content">
                        <img class="pointer team-img mb-4" src="/media/test-folder/bill.jpg" width="100%">
                    </div>
                    <h5><strong>Bill Gates</strong></h5>
                    <small>Back-End Developer</small>
                    <div class="py-2">
                        <i class="fab fa-twitter fa-2x pointer"></i>
                        <i class="fab fa-instagram fa-2x pointer"></i>
                    </div>

                </div>
                <div class="team-info col-6 col-lg-3 p-3 text-center">
                    <div class="mx-auto" style="width: fit-content">
                        <img class="pointer team-img mb-4" src="/media/test-folder/mark.jpg" width="100%">
                    </div>
                    <h5><strong>Mark Zuckerberg</strong></h5>
                    <small>Front-End Developer</small>
                    <div class="py-2">
                        <i class="fab fa-twitter fa-2x pointer"></i>
                        <i class="fab fa-instagram fa-2x pointer"></i>
                    </div>
                </div>
                <div class="team-info col-6 col-lg-3 p-3 text-center">
                    <div class="mx-auto" style="width: fit-content">
                        <img class="pointer team-img mb-4" src="/media/test-folder/evan.jpg" width="100%">
                    </div>
                    <h5><strong>Evan You</strong></h5>
                    <small>GUI Designer</small>
                    <div class="py-2">
                        <i class="fab fa-twitter fa-2x pointer"></i>
                        <i class="fab fa-instagram fa-2x pointer"></i>
                    </div>
                </div>
                <div class="team-info col-6 col-lg-3 p-3 text-center">
                    <div class="mx-auto" style="width: fit-content">
                        <img class="pointer team-img mb-4" src="/media/test-folder/jobs.jpg" width="100%">
                    </div>
                    <h5><strong>Steve Jobs</strong></h5>
                    <small>SEO Specialist</small>
                    <div class="py-2">
                        <i class="fab fa-twitter fa-2x pointer"></i>
                        <i class="fab fa-instagram fa-2x pointer"></i>
                    </div>
                </div>
                <div class="px-4">
                <p class="team-desc text-center">
                    Lorem ipsum dolor sit amet, ei dicant commune eos, probo noluisse molestiae vel ei. Ius praesent
                    theophrastus eu. Ea his labores placerat fabellas, nulla primis at his, veri impetus mentitum ea
                    duo. At
                    eos sumo incorrupte, odio legendos ut sea. No vim alterum officiis, vivendum insolens contentiones
                    ex
                    mel, probo noluisse molestiae vel ei. Ius praesent
                    theophrastus eu. Ea nulla primis at his, veri impetus mentitum ea
                    duo. At
                    eos sumo incorrupte, odio legendos ut sea. No vim alterum officiis, vivendum insolens contentiones
                    ex
                    mel, at usu possim corpora efficiantur. Duo affert odo maiorum eos id, ei pro eripuit
                    legimus.
                </p>

                </div>
            </div>


        </div>

    </div>

    {{--  Section offer  --}}
    <div style="padding-bottom: 80px; padding-top: 80px; background-color: #f1f3f5" class="shadow-sm" dir="ltr">
        <div class="container text-center">
            <h1 style="text-shadow: 0 0 2px;font-family: ACME;font-weight: bold; font-size: 35pt;">SPECIAL OFFER FOR <b
                        style="font-family: ACME; color: #33be54">IRANIAN</b> CUSTOMER</h1>
            <a class="mt-5 d-block mx-auto" style="width: fit-content">
                <button type="button" class="btn btn-lg btn-outline-success px-5" style="font-family: Rambla;">
                    <i class="fas fa-check"></i>
                    ORDER NOW
                </button>
            </a>

        </div>
    </div>






@endsection
