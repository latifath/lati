@extends('layouts.master-dashboard')
@section('paiement')
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card m-b-30">
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Commande effectuée</h4>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Date</th>
                        <th>Reference</th>
                        <th>Type de paiement</th>
                        <th>Monatant</th>
                        <th>Identifiant commande</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i= 1;
                        @endphp
                        @foreach($paiements as $paiement)

                        <tr>
                            <td>{{ $i}}</td>
                            <td>{{ $paiement->created_at }}</td>
                            <td>{{ $paiement->reference }}</td>
                            <td>{{ $paiement->type_paiement }}</td>
                            <td>{{ $paiement->montant }}</td>
                            <td>{{ $paiement->commande_id }}</td>
                            <td>
                                <button id="btn_details_commande" class="btn btn-primary" data-id="{{ commande($paiement->commande_id)->id}}" data-date="{{ commande($paiement->commande_id)->created_at}}" data-status="{{ commande($paiement->commande_id)->status }}"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                            </td>
                            @endforeach
                        </tr>
                        @php
                            $i++;
                        @endphp
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DetailsModalCommande" tabindex="-1" aria-labelledby="DetailsModalCommandeLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table id="datatable1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td><span id='id_com'></span></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><span id='date_com'></span></td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td><span id='status'></span></td>
                    </tr>

                </thead>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="{{ couleur_background_1() }}; {{ couleur_blanche() }}" data-dismiss="modal">Fermé</button>

        </div>
      </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).on('click', '#btn_details_commande', function(){

             var ID = $(this).attr('data-id');
             var date = $(this).attr('data-date');
             var status = $(this).attr('data-status');


            $('#id_com').html(ID);
            $('#date_com').html(date);
            $('#status').html(status);

            $('#DetailsModalCommande').modal('show');
        });
    </script>
@endsection

{{-- <a href="{{ route('root_delete_clients', $item->id) }}">
    <button class="btn" style="{{ couleur_background_2() }}; {{ couleur_blanche() }}"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button>
</a> --}}
