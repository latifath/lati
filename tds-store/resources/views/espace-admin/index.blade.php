@extends('layouts.master-dashboard')
@section('contenu-admin')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cart-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0" >Commande</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success">{{ $nb_cmd_effectuee }}</span><span class="ml-2 text-muted">Commande effectuée</span><br>
                    <span class="badge badge-success">{{  $nb_cmd_attente }}</span><span class="ml-2 text-muted">Commande en cours</span><br>
                    <span class="badge badge-success">{{ $nb_cmd_annulee }}</span><span class="ml-2 text-muted">Commande annulée</span><br>
                    <span class="badge badge-success">{{ $nb_cmd_non_payee }}</span><span class="ml-2 text-muted">Commande non payée</span><br>
                </div>
                <div class="mt-4 text-muted">
                    <h5 class="m-0" style="{{ couleur_text_2() }}">{{ $nb_cmd_effectuee +  $nb_cmd_attente +  $nb_cmd_annulee + $nb_cmd_non_payee}}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-cart-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0" >Produit</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success"></span><span class="ml-2 text-muted"></span><br>
                    <span class="badge badge-success"></span><span class="ml-2 text-muted"></span><br>
                    <span class="badge badge-success"></span><span class="ml-2 text-muted"></span><br>
                    <span class="badge badge-success"></span><span class="ml-2 text-muted"></span><br>
                </div>
                <div class="mt-4 text-muted">
                    <h5 class="m-0" style="{{ couleur_text_2() }}"><i class="mdi mdi-arrow-up text-success ml-2"></i></h5>

                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card mini-stat m-b-30">
            <div class="p-3 bg-primary text-white">
                <div class="mini-stat-icon">
                    <i class="mdi mdi-tag-text-outline float-right mb-0"></i>
                </div>
                <h6 class="text-uppercase mb-0">Newsletter</h6>
            </div>
            <div class="card-body">
                <div class="border-bottom pb-4">
                    <span class="badge badge-success">{{ $new }}</span><span class="ml-2 text-muted">Newsletter</span><br>
                </div>
                <div class="mt-4 text-muted">
                    <h5 class="m-0" style="{{ couleur_text_2() }}">{{ $total }}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>
                </div>
            </div>
        </div>
    </div>

<div class="col-xl-3 col-md-6">
    <div class="card mini-stat m-b-30">
        <div class="p-3 bg-primary text-white">
            <div class="mini-stat-icon">
                <i class="mdi mdi-cart-outline float-right mb-0"></i>
            </div>
            <h6 class="text-uppercase mb-0" >Utilisateur</h6>
        </div>
        <div class="card-body">
            <div class="border-bottom pb-4">
                <span class="badge badge-success">{{ $nbr_client }}</span><span class="ml-2 text-muted">Client</span><br>
                <span class="badge badge-success">{{ $nbr_admin }}</span><span class="ml-2 text-muted">Admin</span><br>
            </div>
            <div class="mt-4 text-muted">
                <h5 class="m-0" style="{{ couleur_text_2() }}">{{ $nbr_client +  $nbr_admin}}<i class="mdi mdi-arrow-up text-success ml-2"></i></h5>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
