@extends('layouts.master')

@section('verifier')
    <!-- Page Header Start -->
    <div class="container-fluid mb-5" style='{{ couleur1() }}'>
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50px">
            <div class="d-inline-flex">
                <p class="m-0"><a href="/"><i class="fa fa-home"></i></a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Validation commande</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form method="POST" action={{ route('root_site_public_validation') }}>
            @csrf
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Adresse de facturation</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nom</label>
                                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->nom : '' }}" type="text" placeholder="" name="nom" >
                                {!! $errors->first('nom', '<p class="text-danger">:message</p>') !!}

                            </div>

                            <div class="col-md-6 form-group">
                                <label>Prénom</label>
                                <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->prenom : '' }}" type="text" placeholder="" name="prenom">
                                {!! $errors->first('prenom', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ auth()->user()->email }}" type="text" placeholder="" name="email">
                                {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Téléphone</label>
                                <input class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->telephone : '' }}" type="text" placeholder="" name="telephone">
                                {!! $errors->first('telephone', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Pays</label>
                                <select class="custom-select {{ $errors->has('pays') ? 'is-invalid' : '' }}" name="pays">
                                    @if (isset($client))
                                        <option value="{{ $client->pays }}">{{ $client->pays }}</option>
                                    @else
                                        <option selected>Bénin</option>
                                    @endif
                                    <option>Ghana</option>
                                    <option>Togo</option>
                                    <option>Niger</option>
                                </select>
                                {!! $errors->first('pays', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Rue</label>
                                <input class="form-control {{ $errors->has('rue') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->rue : '' }}" type="text" placeholder="Numero de la voie et nom de la rue" name="rue">
                                {!! $errors->first('rue', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Ville</label>
                                <input class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->ville : '' }}" type="text" placeholder="" name="ville">
                                {!! $errors->first('ville', '<p class="text-danger">:message</p>') !!}
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Code postal</label>
                                <input class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}" value="{{ isset($client) ? $client->code_postal : '' }}" type="text" placeholder="123" name="code_postal" >
                                {!! $errors->first('code_postal', '<p class="text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @if(session()->has("panier"))

                        @php $total = 0 @endphp

                        <div class="card border-secondary mb-5">


                                <div class="card-header bg-secondary border-0">
                                    <h4 class="font-weight-semi-bold m-0">Total de la commande</h4>
                                </div>
                                <div class="card-body">
                                    <h5 class="font-weight-medium mb-3">Des produits</h5>
                                    @foreach (session("panier") as $key => $item)

                                        @php $total += $item['price'] * $item['quantity'] @endphp
                                        <div class="d-flex justify-content-between">
                                            <p>{{ $item['name'] }} ( x{{ $item['quantity'], }} )</p>
                                            <p>{{ number_format($item['price'] * $item['quantity'], 0, '.', ' ') }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">{{ number_format($total, 0, '.', ' ' ) }}</h5>
                                </div>
                            </div>
                        </div>

                    @endif
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Paiement</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Kkiapay</label>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <a href="{{ route('root_site_public_validation') }}"></a><button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Passer la commande</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->
@endsection
