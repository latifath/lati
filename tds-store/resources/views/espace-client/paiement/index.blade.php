@extends('layouts.master-dashboard')
@section('gestion-paiement')
<div class="col-12">
    <div class="card border-secondary mb-5">
            <div class="card-header bg-secondary border-0">
                <h4 class="font-weight-semi-bold m-0">Historique paiement</h4>
            </div>
            <div class="card-body">
                <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Date paiement</th>
                            <th>Montant du paiement</th>
                            <th>Type de paiement</th>
                            <th>Numero commande</th>
                            <th>Détails Commande</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandes as $item)
                            @if (account_commande($item->id) == "")
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                        </a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ account_commande($item->id)->created_at }}</td>
                                    <td>{{ number_format(account_commande($item->id)->montant, 0, '.', ' ')}} FCFA</td>
                                    <td>{{ account_commande($item->id)->type_paiement }}</td>
                                    <td>{{ account_commande($item->id)->commande_id }}</td>
                                    <td>
                                        <a href="{{ route('root_espace_client_commande_show', $item->id) }}">
                                            <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection
