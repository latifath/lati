<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>TDS-store</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('dashbord/images/favicon.ico') }}">

         <!-- Alertify css -->
         <link href="{{  asset('dashbord/plugins/alertify/css/alertify.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('dashbord/css/bootstrap.min.css') }}" rel="stylesheet"  type="text/css">
        <link href="{{ asset('dashbord/css/icons.css') }}" rel="stylesheet"  type="text/css">
        <link href="{{  asset('dashbord/css/style.css') }}" rel="stylesheet"  type="text/css">

         <!-- DataTables -->
         <link href="{{ asset('dashbord/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ asset('dashbord/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
         <!-- Responsive datatable examples -->
         <link href="{{ asset('dashbord/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


    </head>


    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">

        @include('layouts.partials-dashboard.sidebar')

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                @include('layouts.partials-dashboard.header')

                <div class="page-content-wrapper ">
                    <div class="container-fluid">

                        @include('layouts.partials-dashboard.entête-page')

                        @yield('contenu')

                        @yield('contenu-client')

                         @yield('contenu-commande')

                         @yield('detail')

                         @yield('gestion-paiement')

                         @yield('contenu-admin')

                        @yield('gestion-client')

                        @yield('detail-client')

                        @yield('client-detail-commande')

                        @yield('paiement')

                        @yield('admin-commandes')

                        @yield('les-info')

                        @yield('index-utilisateur')

                        @yield('newsletter')

                    </div>

                </div>


            </div>

            @include('layouts.partials-dashboard.footer')




        </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('dashbord/js/jquery.min.js') }}"></script>

        @yield('js')

        <script src="{{ asset('dashbord/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashbord/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('dashbord/js/detect.js') }}"></script>
        <script src="{{ asset('dashbord/js/fastclick.js') }}"></script>
        <script src="{{ asset('dashbord/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('dashbord/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('dashbord/js/waves.js') }}"></script>
        <script src="{{ asset('dashbord/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('dashbord/js/jquery.scrollTo.min.js') }}"></script>

        <!-- Alertify js -->
        <script src="{{ asset('dashbord/plugins/alertify/js/alertify.js') }}"></script>
        <script src="{{ asset('dashbord/pages/alertify-init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('dashbord/js/app-drixo.js') }}"></script>


        <!-- Required datatable js -->
        <script src="{{ asset('dashbord/plugins/datatables/jquery.dataTables.min.js ')}}"></script>
        <script src="{{ asset('dashbord/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('dashbord/plugins/datatables/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('dashbord/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

        <!-- Datatable init js -->
        <script src="{{ asset('dashbord/pages/datatables.init.js') }}"></script>


        @include('flashy::message');
    </body>
</html>
