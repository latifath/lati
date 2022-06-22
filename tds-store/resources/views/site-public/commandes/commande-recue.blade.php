@extends('layouts.master')

@section('commande-reçue')
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
                <th>E-mail</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->created_at }}</td>
                <td></td>
                <td>{{number_format (total_commande($commande->id), 0, '.', ' ') }}</td>


            </tr>
        </tbody>
    </table>
    <table class="table table-bordered text-center">
        <thead class="bg-secondary text-dark">
            <tr>
                <th>Moyen de paiement</th>
            <tr>
        </thead>
        <tbody>
            <tr>
                <td>Payez par Mobile Money et par Carte Bancaire (Kkiapay)</td>
            </tr>
        </tbody>
    </table>
    <h2 class="pt-4">Détails de la commande</h2>

    <table class="table table-bordered text-center">
        <thead class="bg-secondary text-dark">
            <tr>
                <th>Produit</th>
                <th>Total du produit</th>
            </tr>

        </thead>
        <tbody>
            @php
                $total_commande = 0 ;
            @endphp
            @foreach (detail_commande($commande->id) as $item)
                <tr>
                    <td>{{ produit($item->produit_id)->nom . " x" . $item->quantite }}</td>
                    <td>{{  $item->quantite *  $item->prix }}</td>
                </tr>
                @php
                    $total_commande += ($item->quantite *  $item->prix )
                @endphp
            @endforeach
            <tr>
                <td class="border-right-0"><b> Sous total </b></td>
                <td class="border-left-0">{{ number_format($total_commande, '0', '.', ' ') }}</td>
            </tr>
            <tr>
                <td class="border-right-0">Moyen de paiement :</td>
                <td class="border-left-0">Payez par Mobile Money et par Carte Bancaire (Kkiapay)</td>
            </tr>
            <tr>
                <td class="border-right-0"><b>Total</b></td>
                <td class="border-left-0"><b>{{ total_commande($commande->id) }}</b></td>
            </tr>

        </tbody>
    </table>
    <div class="col-md-6">
        <a href="{{ route('root_index') }}"><button class="btn btn-block btn-primary my-3 py-3">Commander une nouvelle fois</button></a>
    </div>
    <h2 class="pt-4">Adresse de facturation </h2>
    <table class="table table-bordered text-center">
        <div class= "align-block" style="box-shadow: 20px 20px 50px;">
                <td class="border-0 float-left" > {{ client($commande->client_id)->nom . " " . client($commande->client_id)->prenom }}</td></tr>
                <tr><td class="border-0 float-left" > {{ client($commande->client_id)->rue }}</td></tr>
                <tr><td class="border-0 float-left" > {{ client($commande->client_id)->ville . " " . client($commande->client_id)->pays  }}</td></tr>
                <tr><td class="border-0 float-left" > {{ client($commande->client_id)->code_postal }}</td></tr>
                <tr><td class="border-0 float-left" ><i class="fa fa-phone" aria-hidden="true"></i>   {{ client($commande->client_id)->telephone }}</td></tr>
                <td class="border-0 float-left" ><i class="fa fa-envelope" aria-hidden="true"></i>   {{ client($commande->client_id)->email }}</td>
        </div>
    </table>
</div>
@endsection
