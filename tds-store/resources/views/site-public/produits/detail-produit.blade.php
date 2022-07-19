@extends('layouts.master')
@section ('detail_produit')

<!-- Page Header Start -->
<div class="container-fluid mb-5 py-2 px-xl-5" style="{{ couleur_background_1() }}">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50px">

        <div class="d-inline-flex">
            <p class="m-0"><a href="/"><i class="fa fa-home" style="{{ couleur_blanche() }}"></i></a></p>
            <p class="text-muted px-1" style="{{ couleur_blanche() }}">/</p>
            <p class="m-0" style="{{ couleur_blanche() }}">Détail Produit</p>
        </div>
    </div>
</div>

<!-- Page Header End -->
<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        @include('layouts.partials.sidebar')
        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-4 pb-5">
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border" style="height: 400px;">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="{{ $last_image->path }}" alt="Image">
                            </div>
                            @if ($images->count() > 0)
                                @foreach($images as $image)
                                    @if ($last_image->id != $image->id)
                                    <div class="carousel-item">
                                        <img class="w-100 h-100" src="{{ $image->path }}" alt="Image">
                                    </div>
                                    @else{

                                    }
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                            <i class="fa fa-2x fa-angle-left text-dark"></i>
                        </a>
                        <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                            <i class="fa fa-2x fa-angle-right text-dark"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-8 pb-5">
                    <h3 class="font-weight-semi-bold">{{ $produit->nom}}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1"></small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ number_format($produit->prix, 0, '.', ' ') }}FCFA</h3>
                    <form action="{{ route('root_create_panier', $produit) }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                                <input type="text" class="form-control bg-secondary text-center" value="1" name="quantite">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary tx px-3"><i class="fa fa-shopping-cart mr-1"></i> Ajouter au panier</button>
                        </div>
                    </form>

                    <div class="d-flex">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Total:</p>
                        <div class="d-inline-flex text-dark font-weight-medium mb-0 mr-2"> {{ $produit->quantite }}</div>

                    </div>

                    <div class="d-flex pt-2">
                        <p class="text-dark font-weight-medium mb-0 mr-2">Partager sur:</p>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 pt-0">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3" style="{{ couleur_text_2() }}">Description du produit</h4>
                        <p>{{ $produit->description }}</p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>



<!-- Products Start -->
<div class="container-fluid py-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2" style="{{ couleur_text_2() }}">Vous pourriez aussi aimer</span></h2>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach ($sous_categories_produits as $produit)
                <div class="card product-item border-0">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        @if (last_image_produit($produit->id) == "")
                            <img class="img-fluid w-100" src="https://cdn.pixabay.com/photo/2022/05/10/11/12/tree-7186835__480.jpg" alt="">
                        @else
                            <img class="img-fluid w-100" src="{{ last_image_produit($produit->id)->path }}" alt="">
                        @endif
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $produit->nom }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($produit->prix, 0,'.', ' ')}}FCFA</h6>
                            <h6 class="text-muted ml-2"><del>{{ $produit->prix }}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border" style="m-auto">
                        <a href="{{ route('root_sitepublic_show_produit_par_sous_categorie', [$cat, $sous_cat, $produit->slug])}}" class="btn btn-sm p-0 mt-2" style="color: #343a40;"><i class="fas fa-eye  mr-1" style="{{ couleur_text_2() }}"></i>Voir les details</a>
                        <form action="{{ route('root_create_panier', $produit) }}" method="POST">
                            @csrf
                                    <input type="hidden" id="id" name="id" value="{{ $produit->id }}">
                                    <input type="hidden" class="form-control bg-secondary text-center" value="1" name="quantite">
                                <button type="submit" class="btn btn-primary tx"><i class="fa fa-shopping-cart mr-1"></i> Ajouter</button>

                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
@endsection

@section('newsletter')
@include('layouts.partials.newsletter')
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

@if(session()->has('cart'))
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> <i class="fa fa-exclamation" aria-hidden="true"></i> Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Produit ajouté au panier avec succès</h5>
                    <hr>
                    <p>Il y a {{ $cartCount }} @if($cartCount > 1) articles @else article
                        @endif dans votre panier pour un total de <strong>{{ number_format($cartTotal, 2,
        ',', ' ') }} FCFA TTC</strong> hors frais de port.</p>
                    <p><em>Vous avez la possibilité de venir chercher vos produits sur place,
                            dans ce cas vous cocherez la case correspondante lors de la confirmation de votre
                            commande et aucun frais de port ne vous sera facturé.</em></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ route('panier.index') }}" class="btn waves-effect waves-
            light">
                        <i class="material-icons left">check</i>
                        Commander
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif

@section('js')
    <script>
        @if(session()->has('cart'))
            document.addEventListener('DOMContentLoaded', () => {
            const instance = M.Modal.init(document.querySelector('.modal'));
            instance.open();
            });
        @endif
    </script>
@endsection
