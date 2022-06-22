@extends('layouts.master')

@section('validation')
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

    <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered text-center">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Identifiant commande</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $commande->id }}</td>
                        <td>{{ $commande->created_at }}</td>
                        <td>{{number_format ($total, 0, '.', ' ') }}</td>
                    </tr>
                </tbody>
            </table>

        <p class="pt-3">Merci pour votre commande, Cliquez sur le boutton <strong>Procéder au paiement</strong></p>
        <div class="mb-4">
            <div class="col-md-12">
                <button class="btn btn-primary my-3 py-3">Annuler la commande</button>

                <button class="kkiapay-button btn btn-primary my-3 py-3">Procéder au paiement</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script src="https://cdn.kkiapay.me/k.js"></script> --}}
    <script amount="{{ $total }}"
        callback="http://127.0.0.1:8000/validation-commmande/{{ $commande->id }}/commande-reçue"
        data=""
        url="https://technodatasolutions.bj/img/logo.png"
        position="center"
        theme="#0095ff"
        sandbox="true"
        key="08785180ecc811ec848227abfc492dc7"
        src="https://cdn.kkiapay.me/k.js"></script>
@stop
