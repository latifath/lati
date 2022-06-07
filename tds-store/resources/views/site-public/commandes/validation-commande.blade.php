@extends('layouts.master')

@section('verifier')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
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
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Adresse de facturation</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Prénom</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Nom</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Téléphone</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Adresse</label>
                            <input class="form-control" type="text" placeholder="Numero de la voie et nom de la rue">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Pays</label>
                            <select class="custom-select">
                                <option selected>Bénin</option>
                                <option>Ghana</option>
                                <option>Togo</option>
                                <option>Niger</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ville</label>
                            <input class="form-control" type="text" placeholder="">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Code postal</label>
                            <input class="form-control" type="text" placeholder="123">
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Creer un compte</label>
                            </div>
                        </div>
                        <div>

                        </div>
                        <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="+123 456 789">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 1</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address Line 2</label>
                            <input class="form-control" type="text" placeholder="123 Street">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Country</label>
                            <select class="custom-select">
                                <option selected>United States</option>
                                <option>Afghanistan</option>
                                <option>Albania</option>
                                <option>Algeria</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>City</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>ZIP Code</label>
                            <input class="form-control" type="text" placeholder="123">
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
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Contrôle direct</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Virement</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Passer la commande</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
