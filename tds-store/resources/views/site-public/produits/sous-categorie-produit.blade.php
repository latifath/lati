@extends('layouts.master', ['titre' => 'moi'])

@section('produit')
    <div class="container-fluid ">
        <div class="row px-xl-5 pb-3">
            @include('layouts.partials.sidebar')
            {{-- carousel --}}
            <div class="col-lg-9">
                <div class="container-fluid pt-2">
                    {{-- {{ dd('dd') }} --}}
                    <div class="text-center mb-4">
                        <h2 class="section-title px-5"><span class="px-2">Nos produits</span></h2>
                    </div>
                    <div class="row px-xl-5 pb-3">
                        @foreach ($sous_categories_produits as $produit)
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
                                        <a href="{{ route('root_sitepublic_show_produit_par_sous_categorie', [$cat, $sous_cat, $produit->slug])}}" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-eye text-primary mr-1"></i>Voir
                                            les details
                                        </a>
                                        <a href="" class="btn btn-sm text-dark p-0"><i
                                                class="fas fa-shopping-cart text-primary mr-1"></i>Ajouter au panier</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- pagination --}}
                    {{-- {{ $sous_categories_produits->links() }} --}}
                    {{-- pagination end --}}
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
                    @foreach (partenaires_logo() as $item)
                        <div class="vendor-item border p-4">
                            <img src="{{ $item->logo }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
@endsection
