@extends('layouts.master')
@section('head')
<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />

    <style>
        .iti{
            display : block !important;
        }
    </style>
@endsection
@section('verifier')
    <!-- Page Header Start -->
    <div class="container-fluid mb-5" style='{{ couleur_background_1() }}'>
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 50px">
            <div class="d-inline-flex">
                <p class="m-0"><a href="/"><i class="fa fa-home" style="{{ couleur_blanche() }}"></i></a></p>
                <p class="m-0 px-2" style="{{ couleur_blanche() }}">/</p>
                <p class="m-0" style="{{ couleur_blanche() }}">Validation commande</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form method="POST" action={{ route('root_site_public_validation') }}>
            @csrf
            <div class="row px-xl-5">
                @include('layouts.partials.sidebar')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="mb-4 col-12">
                            <fieldset class="border p-2 mr-auto ml-2" style="border-color: #212529!important;">
                                <legend>
                                    <h4 class="font-weight-semi-bold mb-4">Adresse de facturation</h4>
                                </legend>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nom</label>
                                        <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->nom : '' }}" type="text" placeholder="" name="nom" >
                                        {!! $errors->first('nom', '<p class="text-danger">:message</p>') !!}

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Prénom</label>
                                        <input class="form-control {{ $errors->has('prenom') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->prenom : '' }}" type="text" placeholder="" name="prenom">
                                        {!! $errors->first('prenom', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ auth()->user()->email }}" type="text" placeholder="" name="email">
                                        {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Téléphone</label>
                                        <input id="phone" type="tel"  class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->telephone : '' }}"  placeholder="" name="telephone">
                                        {!! $errors->first('telephone', '<p class="text-danger">:message</p>') !!}

                                       <div class="alert alert-info" style="display: none;"></div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Pays</label>
                                        <select class="custom-select {{ $errors->has('pays') ? 'is-invalid' : '' }}" name="pays">
                                            @if (isset($adresseclient))
                                                <option value="{{ $adresseclient->pays }}">{{ $adresseclient->pays }}</option>
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
                                        <input class="form-control {{ $errors->has('rue') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->rue : '' }}" type="text" placeholder="Numero de la voie et nom de la rue" name="rue">
                                        {!! $errors->first('rue', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Ville</label>
                                        <input class="form-control {{ $errors->has('ville') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->ville : '' }}" type="text" placeholder="" name="ville">
                                        {!! $errors->first('ville', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Code postal</label>
                                        <input class="form-control {{ $errors->has('code_postal') ? 'is-invalid' : '' }}" value="{{ isset($adresseclient) ? $adresseclient->code_postal : '' }}" type="text" placeholder="123" name="code_postal" >
                                        {!! $errors->first('code_postal', '<p class="text-danger">:message</p>') !!}

                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="mb-4 col-12">
                            <fieldset class="border p-2 mr-auto ml-2" style="border-color: #212529!important;">
                                <legend>
                                    <h4 class="font-weight-semi-bold mb-4">Adresse de livraison</h4>
                                </legend>
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <div class="form-check">
                                        <label class="form-check-label check-form-livraison" >
                                            <input type="checkbox" class="form-check-input" value=""  onchange="valueChanged()">Adresse de livraison différente de adresse de facturation
                                        </label>
                                        </div>

                                </div>
                                <div class="row form-livraison">
                                    <div class="col-md-6 form-group ">
                                        <label>Nom</label>
                                        <input class="form-control {{ $errors->has('nomLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="" name="nomLivraison" >
                                        {!! $errors->first('nomLivraison', '<p class="text-danger">:message</p>') !!}

                                   </div>

                                    <div class="col-md-6 form-group">
                                        <label>Prénom</label>
                                        <input class="form-control {{ $errors->has('prenomLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="" name="prenomLivraison">
                                        {!! $errors->first('prenomLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label>
                                        <input class="form-control {{ $errors->has('emailLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="" name="emailLivraison">
                                        {!! $errors->first('emailLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <form id="login" onsubmit="process(event)">
                                        <label>Téléphone</label>
                                        <input  id="phone" type="tel" class="form-control {{ $errors->has('telephoneLivraison') ? 'is-invalid' : '' }}" placeholder="" name="telephoneLivraison">
                                        {!! $errors->first('telephoneLivraison', '<p class="text-danger">:message</p>') !!}
                                        </form>
                                        <div class="alert alert-info" style="display: none;"></div>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Pays</label>
                                        <select class="custom-select {{ $errors->has('paysLivraison') ? 'is-invalid' : '' }}" name="paysLivraison">
                                            @if (isset($adresseclient))
                                                <option value="{{ $adresseclient->pays }}">{{ $adresseclient->pays }}</option>
                                            @else
                                                <option selected>Bénin</option>
                                            @endif
                                            <option>Ghana</option>
                                            <option>Togo</option>
                                            <option>Niger</option>
                                        </select>
                                        {!! $errors->first('paysLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Rue</label>
                                        <input class="form-control {{ $errors->has('rueLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="Numero de la voie et nom de la rue" name="rueLivraison">
                                        {!! $errors->first('rueLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Ville</label>
                                        <input  style="border: 1px, solid" class="form-control {{ $errors->has('villeLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="" name="villeLivraison">
                                        {!! $errors->first('villeLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>Code postal</label>
                                        <input class="form-control {{ $errors->has('code_postalLivraison') ? 'is-invalid' : '' }}" type="text" placeholder="123" name="code_postalLivraison" >
                                        {!! $errors->first('code_postalLivraison', '<p class="text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">

                        @if(session()->has("panier"))

                            @php $total = 0 @endphp

                            <div class="col-md-6">
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
                                                <p>{{ number_format($item['price'] * $item['quantity'], 0, '.', ' ') }} FCFA</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="card-footer border-secondary bg-transparent">
                                        <div class="d-flex justify-content-between mt-2">
                                            <h5 class="font-weight-bold" style="{{ couleur_text_2() }}">Total</h5>
                                            <h5 class="font-weight-bold" style="{{ couleur_text_2() }}">{{ number_format($total, 0, '.', ' ' ) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="card border-secondary mb-5">
                                <div class="card-header bg-secondary border-0">
                                    <h4 class="font-weight-semi-bold m-0">Paiement</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="carte_bancaire" name="payment" id="cart">
                                            <label class="custom-control-label" for="cart">carte </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="momo" name="payment" id="mobile">
                                            <label class="custom-control-label" for="mobile">Mobile Money</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="paypal" name="payment" id="mobile">
                                            <label class="custom-control-label" for="mobile">PayPal</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" value="livraison" name="payment" id="livraison">
                                            <label class="custom-control-label" for="livraison">Paiement à la livraison</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-secondary bg-transparent">
                                    <a href="{{ route('root_site_public_validation') }}"></a><button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Passer la commande</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->

@endsection

<script>
    function valueChanged()
    {
        if($('.form-check-input').is(":checked"))
        {
            $(".form-livraison").show();
            setRequired(true)
        }
        else
        {
            $(".form-livraison").hide();
            setRequired(false)
        }
    }

    function setRequired(val){
        var input = document.querySelectorAll('.form-livraison input')
        for(i = 0; i < input.length; i++){
            input[i].required = val;
        }
    }

    window.onload = function () {
        valueChanged()
    }

</script>
@section('js')
<script>

function getIp(callback) {
 fetch('https://ipinfo.io/json?token=9299d29dc5c97f', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
    const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
     initialCountry: "auto",
     geoIpLookup: getIp,
     preferredCountries: ["côte-d'ivore", "gha", "togo", "fr"],
     utilsScript:
       "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });



const info = document.querySelector(".alert-info");

function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "";
 info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
}
</script>
@endsection

