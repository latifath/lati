@extends('layouts.master', ['titre' => 'home'])

@section('produit')
    <div class="container-fluid ">
        <div class="row px-xl-5 pb-3">
            @include('layouts.partials.sidebar')
            {{-- carousel --}}
            <div class="col-lg-9">
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/server.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    {{-- <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Achetez maintenant</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/server.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    {{-- <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3" style="background-color: #01674e;">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/tech.webp') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    {{-- <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/Digital.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
                {{-- carousel End --}}

                <!-- Products Start -->
                <div class="container-fluid pt-5">
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2" style="{{ couleur_text_2() }}">Nos derniers produits</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        @foreach ($produits_latest as $produit)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4" style="width: 20rem ;">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ asset('assets/img/product-1.jpg') }}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3" style="{{ couleur_text_2() }}">
                                        <h6 class="text-truncate mb-3">{{ $produit->nom}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6 >{{ number_format($produit->prix, 0, '.', ' ') }} FCFA</h6>
                                            <h6 class="text-muted ml-2"><del>{{ number_format($produit->prix, 0, '.', ' ') }} FCFA</del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('root_sitepublic_show_produit_par_sous_categorie', [one_categorie(one_sous_categorie($produit->sous_categorie_id)->categorie_id)->slug, one_sous_categorie($produit->sous_categorie_id)->slug, $produit->slug])}}" class="btn btn-sm p-0" style="color: #343a40;"><i
                                                class="fas fa-eye mr-1" style="{{ couleur_text_2() }}"></i>Voir
                                            les details
                                        </a>

                                        <form action="{{ route('root_create_panier', $produit) }}" method="POST">
                                            @csrf
                                                <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                                                <input type="hidden" class="form-control bg-secondary text-center" value="1" name="quantite">
                                                <button type="submit" class=" btn btn-primary tx"><i class="fa fa-shopping-cart mr-1"></i> Ajouter</button>
                                        </form>

                                        {{-- <a href="/panier" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container" style="align-item: center">
                            <a href="{{ route('root_sitepublic_produits') }}" class="btn btn-primary text-white tx" role="button">Voir plus</a>
                        </div>
                        <!-- Products End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('newsletter')
    @include('layouts.partials.newsletter')
@endsection

@section('partenaire')
    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    @foreach (partenaires_logo() as $pl)
                        <div class="vendor-item border p-4">
                            <img src="{{ $pl->logo }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
