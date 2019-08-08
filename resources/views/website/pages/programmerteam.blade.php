@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')

    {{--  Section offer  --}}
    <div class="team-details shadow-sm" dir="ltr">
        <div class="container">
            <h3 class="mb-5 team-title">
                The Afrang Programmer Team
            </h3>
            <p class="team-desc">
                Afrang's policy to collaborate with different people is always orbital ethics with technical skills and
                the desire for improvement. with these important features, we created our special team.
            </p>









            <div class="row mx-0 myteam-info justify-content-around">


                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <div class="position-relative team-box">
                        <div class="position-absolute team-image">
                            <div class="mx-auto">
                                <img class="our-img pointer" src="/media/test-folder/bill.jpg">
                            </div>
                        </div>
                        <h4><strong>Bill Gates</strong></h4>
                        <small>Back-End Developer</small>
                        <div class="text-left px-4 py-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque doloribus
                                ducimus
                                eius optio soluta suscipit tenetur unde. Dolore dolorem eveniet fugit incidunt labore,
                                minus
                                officiis quidem quos recusandae unde.
                            </p>
                        </div>
                        <div class="py-3 position-absolute team-footer">
                            <i class="fab fa-twitter fa-2x pointer mx-1"></i>
                            <i class="fab fa-instagram fa-2x pointer mx-1"></i>
                            <i class="far fa-envelope fa-2x pointer mx-1"></i>

                        </div>
                    </div>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <div class="position-relative team-box">
                        <div class="position-absolute team-image">
                            <div class="mx-auto">
                                <img class="our-img pointer" src="/media/test-folder/mark.jpg">
                            </div>
                        </div>
                        <h4><strong>Mark Zuckerberg</strong></h4>
                        <small>Front-End Developer</small>
                        <div class="text-left px-4 py-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque doloribus
                                ducimus
                                eius optio soluta suscipit tenetur unde. Dolore dolorem eveniet fugit incidunt labore,
                                minus
                                officiis quidem quos recusandae unde.
                            </p>
                        </div>
                        <div class="py-3 position-absolute team-footer">
                            <i class="fab fa-twitter fa-2x pointer mx-1"></i>
                            <i class="fab fa-instagram fa-2x pointer mx-1"></i>
                            <i class="far fa-envelope fa-2x pointer mx-1"></i>

                        </div>
                    </div>
                </div>
                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <div class="position-relative team-box">
                        <div class="position-absolute team-image">
                            <div class="mx-auto">
                                <img class="our-img pointer" src="/media/test-folder/evan.jpg">
                            </div>
                        </div>
                        <h4><strong>Evan You</strong></h4>
                        <small>GUI Designer</small>
                        <div class="text-left px-4 py-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque doloribus
                                ducimus
                                eius optio soluta suscipit tenetur unde. Dolore dolorem eveniet fugit incidunt labore,
                                minus
                                officiis quidem quos recusandae unde.
                            </p>
                        </div>
                        <div class="py-3 position-absolute team-footer">
                            <i class="fab fa-twitter fa-2x pointer mx-1"></i>
                            <i class="fab fa-instagram fa-2x pointer mx-1"></i>
                            <i class="far fa-envelope fa-2x pointer mx-1"></i>

                        </div>
                    </div>
                </div>

                <div class="team-person col-12 col-md-6 col-lg-4 py-3 px-4 text-center">
                    <div class="position-relative team-box">
                        <div class="position-absolute team-image">
                            <div class="mx-auto">
                                <img class="our-img pointer" src="/media/test-folder/jobs.jpg">
                            </div>
                        </div>
                        <h4><strong>Steve Jobs</strong></h4>
                        <small>SEO Specialist</small>
                        <div class="text-left px-4 py-3">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda atque doloribus
                                ducimus
                                eius optio soluta suscipit tenetur unde. Dolore dolorem eveniet fugit incidunt labore,
                                minus
                                officiis quidem quos recusandae unde.
                            </p>
                        </div>
                        <div class="py-3 position-absolute team-footer">
                            <i class="fab fa-twitter fa-2x pointer mx-1"></i>
                            <i class="fab fa-instagram fa-2x pointer mx-1"></i>
                            <i class="far fa-envelope fa-2x pointer mx-1"></i>

                        </div>
                    </div>
                </div>







            </div>


        </div>
    </div>





@endsection
