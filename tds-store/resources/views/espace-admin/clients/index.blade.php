@extends('layouts.master-dashboard')
@section('gestion-client')
<div class="row">
    <div class="col-md-12 col-12">
        <div class="card m-b-30">
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Clients</h4>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>E-mail</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($utilisateurs as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                    <button id="btn_delete" class="btn " data-attr="" class="btn" style="{{ couleur_background_2() }}; {{ couleur_blanche() }}"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button>

                                <a href="#">
                                    <button class="btn" style="{{ couleur_background_2() }}; {{ couleur_blanche() }}"><i class="fa fa-trash" aria-hidden="true"></i> Bloquer l'accès</button>
                                </a>
                                <a href="{{ route('root_espace_admin_clients_show', $item->id )}}">
                                    <button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Voir</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @include('layouts.Modal') --}}
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@section('js')
    <script>
        $(document).on('click', '#btn_delete', function(){

            $('#DeleteModalCenter').modal('show');
        });
    </script>
@endsection
@endsection
