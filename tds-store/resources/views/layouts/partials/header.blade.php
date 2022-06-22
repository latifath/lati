<div class="container-fluid">
    <div class="row py-2 px-xl-5" style="font-size: 13.5px; {{ couleur1() }}">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-1" href="">Des questions?</a>
                {{-- <span class="text-muted px-1"></span> --}}
                <a class="text-nowrap px-1" href="">Contactez-nous!</a>
                <span class="text-nowrap">
                    <strong>Téléphone </strong>
                    <a href="tel:+370 615 85560">+370 615 85560</a>
                </span>
                <span class="hidden-xs">, </span>
                <span class="text-nowrap px-1">
                    <strong>Email</strong>
                    <a href="#">info@tdsstore.bj</a>
                </span>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                  {{-- pour voir si un utilisateur est connecté et affiché certaine chose  --}}
                @auth
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                            Déconnexion
                        </x-jet-responsive-nav-link>
                    </form>

                    @else
                        <a href="{{ route('root_auth_user_login') }}" class="nav-item nav-link  p-0 ">Connexion</a>

                        @if (Route::has('register'))
                            <span class="text-muted px-1">|</span>

                            <a href="{{ route('root_auth_user_register') }}" class="nav-item nav-link  p-0 ">Inscription</a>
                        @endif
                @endauth
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1"><img src="{{ asset('assets/img/tds.png') }}" alt=""</h1>
            </a>
        </div>

        <div class="col-lg-6 col-6 text-left p-0">
            @livewire('search')
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>

            <a href="{{ route('root_show_panier') }}" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">
                    @if(session()->has("panier"))
                        {{ count(session("panier")) }}
                    @else
                        0
                    @endif
                </span>
            </a>

        </div>
    </div>
</div>

<!-- Navbar Start -->
<div class="container-fluid mb-5" style="color:#1C1C1C ">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="/welcome" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse" style="background-color: #f0f0f0;">
                    <div class="navbar-nav m-auto py-0" style="padding: 10px 20px; background-color: #f0f0f0; border-right: 1px solid #fff; color:#1C1C1C;">
                        @php
                        $i = 0
                        @endphp
                        @foreach (categorie_menu() as $item)
                        @php
                        $i++
                        @endphp
                        @if($i <= 8) @if(sous_categories_menu($item->id)->count() == 0)
                            <a href="index.html" class="nav-item nav-link active" style="border-right: 1px solid #fff; padding-right: 40px;">{{ $item->nom }}</a>
                            @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="padding-right: 40px; border-right: 1px solid #fff;">{{ $item->nom }}</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    @foreach (sous_categories_menu($item->id) as $k)
                                    <a href="{{ route('root_sitepublic_all_produit_par_sous_categorie', [$item->slug, $k->slug])}}" class="dropdown-item">{{ $k->nom }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @endif
                            @endforeach
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

