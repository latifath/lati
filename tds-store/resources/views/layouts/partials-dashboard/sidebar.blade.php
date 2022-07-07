<div class="left side-menu" >
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none" >
        <div class="text-center" style="{{ couleur_principal() }}">

            <a href="/" class="logo"><img src="{{ asset('dashbord/images/logo-dark.png') }}" height="20" alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">

            <ul>
                <li class="menu-title">principal</li>

                @client
                    <li>
                        <a href="{{ route('root_espace_client_index') }}" class="waves-effect">
                            <i class="dripicons-meter"></i>
                            <span> Tableau de bord <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-cart"></i> <span> Commande </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="/">Ajouter commande</a></li>
                            <li><a href="{{ route('root_espace_client_commande_index') }}">Liste commandes</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-briefcase"></i> <span> Paiement </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('root_espace_client_index') }}">Dernier Paiement</a></li>
                            <li><a href="{{ route('root_espace_client_paiement_index') }}">Tous les paiements </a></li>
                        </ul>
                    </li>
                @endclient

                @admin

                    <li>
                        <a href="{{ route('root_espace_admin_index') }}" class="waves-effect">
                            <i class="dripicons-meter"></i>
                            <span> Tableau de bord <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-cart"></i> <span> Client</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('root_espace_admin_clients_index') }}">Tous les clients</a></li>
                        </ul>
                    </li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-shopping-cart"></i> <span> Paiement</span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('root_espace_admin_paiements_index') }}">Tous les paiements</a></li>
                        </ul>
                    </li>

                @endadmin
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->

</div>
