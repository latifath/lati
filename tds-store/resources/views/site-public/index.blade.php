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
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Achetez maintenant</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/server.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                    </h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Image">
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
                        <h2 class="section-title px-5"><span class="px-2">Nos derniers produits</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        @foreach ($produits_latest as $produit)
                            <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4" style="width: 20rem ;">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="{{ asset('assets/img/product-1.jpg') }}" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">{{ $produit->nom}}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ $produit->prix }}</h6>
                                            <h6 class="text-muted ml-2"><del>{{ $produit->prix }}</del></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('root_sitepublic_show_produit_par_sous_categorie', [one_categorie(one_sous_categorie($produit->sous_categorie_id)->categorie_id)->slug, one_sous_categorie($produit->sous_categorie_id)->slug, $produit->slug])}}" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>Voir
                                            les details
                                        </a>
                                        <a href="panier" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="container" style="padding-left: 530px;">
                            <a href="/produits" class="btn btn-info" role="button" style="background-color: #D19C97;
                                    border-color: #D19C97; color:black;">Voir plus</a>
                        </div>
                        <!-- Products End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('newsletter')
    <!-- Subscribe Start -->
    <div class="container-fluid bg-secondary my-4">
        <div class="row justify-content-md-center py-2 px-xl-5">
            <div class="col-md-6 col-12 py-5">
                <div class="text-center mb-2 pb-2">
                    <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Restez à jour</span></h2>
                    <p>Inscrivez-vous pour recevoir les actualités de Tds-store !</p>
                </div>
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-4" placeholder="Entrez l'email...">
                        <div class="input-group-append">
                            <button class="btn btn-primary px-4">S'abonner</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->
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
