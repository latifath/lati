@extends('layouts.master-dashboard')
@section('contenu-commande')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header bg-success">
                    <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Commande effectuée</h4>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Type de paiement</th>
                            <th>produit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list_commandes_effectuee as $item)

                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ number_format(account_commande($item->id)->montant, 0, '.', ' ')}} FCFA</td>
                                <td>{{ $item->type_paiement}}</td>
                                <td>
                                    <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header bg-success">
                    <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;"> Commande en attente</h4>
                </div>

                <div class="card-body">
                    <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Type de paiement</th>
                            <th>produit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list_commandes_en_attente as $item)

                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ number_format(account_commande($item->id)->montant, '0', '.', ' ' )}}FCFA</td>
                                <td>{{ account_commande($item->id)->type_paiement}}</td>
                                <td>
                                    <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                </a>
                                </td>


                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    {{-- tableau commande annuler  --}}
    {{-- <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header bg-success">
                    <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Commande annulée</h4>
                </div>

                <div class="card-body">
                    <table id="datatable2" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Type de paiement</th>
                            <th>produit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list_commandes_annulee as $item)

                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ number_format(account_commande($item->id)->montant, 0, '.', ' ' )}}FCFA</td>
                                <td>{{ account_commande($item->id)->type_paiement}}</td>
                                <td>
                                    <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                    </a>
                                </td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row --> --}}

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-header bg-success">
                    <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Commande non payée</h4>
                </div>

                <div class="card-body">
                    <table id="datatable3" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }};">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Type de paiement</th>
                            <th>produit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($list_commandes_non_payee  as $item)

                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->created_at}}</td>
                                <td>{{ number_format(account_commande($item->id)->montant, 0, '.', ' ' )}} FCFA</td>
                                <td>{{ account_commande($item->id)->type_paiement}}</td>
                                <td>
                                    <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                        <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                    </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

{{-- pour eviter les confusion avec les id au niveau des tables --}}
@section('js')
<script>
    $(document).ready(function() {
        $('#datatable1').DataTable();
    });
    $(document).ready(function() {
        $('#datatable2').DataTable();
    });
    $(document).ready(function() {
        $('#datatable3').DataTable();
    });
</script>
@endsection
