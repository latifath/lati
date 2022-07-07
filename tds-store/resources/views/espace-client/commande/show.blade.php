@extends('layouts.master-dashboard')
@section('detail')
<div class="col-12">
        <div class="card border-secondary mb-5">
                <div class="card-header border-0" style="{{ couleur_principal() }}; font-size: 24px;">
                    <h4 class="font-weight-semi-bold m-0" style="{{ couleur_background_1() }}">Commande #{{ $id }}</h4>
                </div>
                <div class="card-body">
                    <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Montant</th>
                            <th>Sous total</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0 ;
                            @endphp
                            @foreach($commande_detail as $item)
                            @php $total += $item['prix'] * $item['quantite'] @endphp
                                <tr>
                                    <td>{{ produit($item->produit_id)->nom}}</td>
                                    <td>{{ $item->quantite }}</td>
                                    <td>{{number_format($item->prix, 0, '.', ' ') }} FCFA</td>
                                    <td>{{ number_format($item->quantite * $item->prix, 0, '.', ' ') }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="card-footer border-secondary bg-transparent">
                <div class="d-flex justify-content-between mt-2">
                    <h5 class="font-weight-bold">Total</h5>
                    <h5 class="font-weight-bold">{{ number_format($total, 0, '.', ' ') }} FCFA</h5>
                </div>
            </div>
        </div>
</div>
<br><br>
<div class="col-12">
    <div class="card border-secondary mb-5">
            <div class="card-header border-0"  style="{{ couleur_principal() }}; font-size: 24px;">
                <h4 class="font-weight-semi-bold m-0">Adresse Client</h4>
            </div>
            <div class="card-body">
                <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Pays</th>
                        <th>Rue</th>
                        <th>Ville</th>
                        <th>Code postal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($commande as $item)
                            <td>{{ adresseclient($item->adresse_client_id)->nom }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->prenom }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->email }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->telephone}}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->pays }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->rue }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->ville }}</td>
                            <td>{{ adresseclient($item->adresse_client_id)->code_postal}}</td>

                              @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>
    </div>
</div>
<br><br>
<div class="col-12">
    <div class="card border-secondary mb-5">
            <div class="card-header border-0"  style="{{ couleur_principal() }}; font-size: 24px;">
                <h4 class="font-weight-semi-bold m-0">Détails paiement</h4>
            </div>
            <div class="card-body">
                <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Type de paiement</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($commandes as $value)
                            <tr>
                                <td>{{ number_format($value->montant, 0, '.', ' ') }} FCFA</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{  $value->type_paiement  }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>

@endsection
