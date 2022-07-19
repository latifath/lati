@extends('layouts.master-dashboard')
@section('newsletter')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header bg-success">
                <h4 class="mt-0 header-title text-white" style="font-size: 24px; text-align: center;">Newsletter</h4>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%; {{ couleur_principal() }}">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>E-mail</th>
                        <th>Date</th>

                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @foreach($newsletter  as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_at }}</td>

                        </tr>
                        @php
                            $i++;
                        @endphp
                         @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
