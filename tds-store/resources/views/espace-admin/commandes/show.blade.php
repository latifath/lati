@extends('layouts.master-dashboard')

@section('les-info')
<div class="row mt-5">
    <div class="col-md-12 col-sm-12">
        <div class="card m-b-30" >
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Historiques</h4>
            </div>
            <div class="card-body">
                <p class="text-center" style="font-size: 24px;"><strong>Adresse client</strong></p>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Nom & Prénom</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_cli->nom }} {{ $adr_cli->prenom }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>E-mail</strong>
                    </div>
                    <div class="col-sm-6">{{  $adr_cli->email }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Téléphone</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_cli->telephone }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Rue & Ville</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_cli->rue }} {{ $adr_cli->ville }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Code Postal & Pays</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_cli->code_postal }} {{ $adr_cli->pays }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12 col-sm-12">
        <div class="card m-b-30" >
            <div class="card-body">
                <p class="text-center" style="font-size: 24px;"><strong>Adresse livraison</strong></p>

                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Nom & Prénom</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_livr->nom}} {{ $adr_livr->prenom }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>E-mail</strong>
                    </div>
                    <div class="col-sm-6">{{  $adr_livr->email }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Téléphone</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_livr->telephone }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Rue & Ville</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_livr->rue }} {{ $adr_livr->ville }}</div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <strong>Code Postal & Pays</strong>
                    </div>
                    <div class="col-sm-6">{{ $adr_livr->code_postal }} {{ $adr_livr->pays }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-12">
        <div class="card m-b-30">
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Paiements</h4>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Reference</th>
                        <th>Montant</th>
                        <th>Type paiement</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $paiement_commande->id }}</td>
                            <td>{{ $paiement_commande->reference }}</td>
                            <td>{{ $paiement_commande->montant }}</td>
                            <td>{{ $paiement_commande->type_paiement }}</td>
                            <td>{{ $paiement_commande->created_at }}</td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection
