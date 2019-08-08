<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ @$title }} </title>
    <link href='/css/admin.css' rel='stylesheet' type='text/css'>


</head>
<style>

    .collapsed::after {
        content: '\f104' !important;
        text-align: right !important;
        float: left !important;
    }

    [data-toggle="collapse"] {
        text-align: right !important;
    }

</style>


<body id="page-top">

<!-- Page Wrapper -->

<div id="wrapper" dir="rtl">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion text-center"
        style="padding: 0px;text-align: right;" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                <svg version="1.1"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                     x="0px" y="0px" width="47.8px" height="47.8px" viewBox="0 0 47.8 47.8"
                     style="enable-background:new 0 0 47.8 47.8;"
                     xml:space="preserve">
     <defs>
     </defs>
                    <path class="st01" d="M23.9,0c13.2,0,23.9,10.7,23.9,23.9S37.1,47.8,23.9,47.8S0,37.1,0,23.9S10.7,0,23.9,0z M45,23.9
	c0-11.6-9.4-21.1-21.1-21.1S2.8,12.2,2.8,23.9S12.2,45,23.9,45S45,35.5,45,23.9z"/>
                    <path class="st01" d="M23.9,3.5c11.3,0,20.4,9.1,20.4,20.4s-9.1,20.4-20.4,20.4S3.5,35.1,3.5,23.9S12.6,3.5,23.9,3.5z M23.9,41.4
	c9.7,0,17.5-7.9,17.5-17.5S33.6,6.3,23.9,6.3S6.3,14.2,6.3,23.9C6.3,33.6,14.2,41.4,23.9,41.4z"/>
                    <g>
                        <path class="st01"
                              d="M24.4,32.8H10.1v-6.5l14.3-17h6.9v17.3h7.2l-2.9,6.1h-4.3V38h-6.9V32.8z M24.4,26.7v-8.9l-7.6,8.9H24.4z"/>
                    </g>
                    <path class="st01" d="M40.8,23.9c0,9.3-7.5,16.9-16.9,16.9C14.6,40.8,7,33.2,7,23.9C7,14.6,14.5,7,23.9,7C33.2,7,40.8,14.6,40.8,23.9
	z M38,23.9c0-7.8-6.3-14.1-14.1-14.1S9.8,16.1,9.8,23.9S16.1,38,23.9,38S38,31.7,38,23.9z"/>
</svg>

            </div>
            <div class="sidebar-brand-text mx-3">TISS <sup>4.0</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active" dir="rtl">
            <a class="nav-link text-right">

                <span>{{ Auth::user()->name  }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading text-right">
            MENUS
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item text-right" v-for="item in menu">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" v-bind:data-target="'#'+item.href"
               aria-expanded="true" aria-controls="collapseTwo">
                <i v-bind:class="item.icon"></i>
                <span v-text="item.title"></span>
            </a>
            <div v-bind:id="item.href" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                </a>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"></h6>
                    <a class="collapse-item" v-for="menus in item.child" v-bind:href="menus.href"
                       v-text="menus.title"></a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
    </ul>
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <!-- Nav Item - Messages -->

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <wellcome></wellcome>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- Content Row -->


                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">{{ @$title }}</h6>

                            </div>
                            <!-- Card Body -->
                            <div class="card-body text-right" dir="rtl">  @yield('page')  </div>
                        </div>
                    </div>

                    <!-- Pie Chart -->
                </div>

                <!-- Content Row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright AfrangArt Design Studio <strong>TISS &copy; {{ date('Y') }} Market Ver 4.0</strong> </span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<script src="/js/admin.js"></script>


</body>

</html>
