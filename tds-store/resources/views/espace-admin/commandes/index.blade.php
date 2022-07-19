@extends('layouts.master-dashboard')

@section('admin-commandes')

<div class="row">
    <div class="col-md-12 col-12">
        <div class="card m-b-30">
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Toutes les commandes</h4>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Id client</th>
                        <th>Id livraison</th>
                        <th>Id utilisateur</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $y= 1;
                        @endphp
                        @foreach ($commandes as $commande)

                        <tr>
                            <td>{{ $y}}</td>
                            <td>{{ $commande->id }}</td>
                            <td>{{ $commande->created_at }}</td>
                            <td>{{ $commande->status }}</td>
                            <td>{{ $commande->adresse_client_id }}</td>
                            <td>{{ $commande->adresse_livraison_id}}</td>
                            <td>{{ $commande->user_id}}</td>
                            <td>
                            <a href="{{ route('root_espace_admin_commandes_show', $commande->id) }}">
                                <button  class="btn btn-primary"></i> Voir</button>
                            </a>
                            </td>
                            @php
                            $y++;
                            @endphp
                        @endforeach
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- <div class="modal fade" id="DetailsModalPaiement" tabindex="-1" aria-labelledby="DetailsModalPaiementLabel" aria-hidden="true">
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
                        <td>Reference</td>
                        <td><span id='date_com'></span></td>
                    </tr>
                    <tr>
                        <td>Montant</td>
                        <td><span id='statut'></span></td>
                    </tr>
                     <tr>
                        <td>Type de paiement</td>
                        <td><span id='statut'></span></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><span id='statut'></span></td>
                    </tr>

                </thead>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn" style="{{ couleur_background_1() }}; {{ couleur_blanche() }}" data-dismiss="modal">Fermé</button>

        </div>
      </div>
    </div>
</div> --}}
@endsection

{{-- @section('js')
    <script>
        $(document).on('click', '#btn_details_paiement', function(){

            //  var ID = $(this).attr('data-id');
            //  var date = $(this).attr('data-date');
            //  var statut = $(this).attr('data-statut');

            // $('#id_com').html(ID);
            // $('#date_com').html(date);
            // $('#statut').html(statut);

            $('#DetailsModalPaiement').modal('show');
        });
    </script>
@endsection --}}
