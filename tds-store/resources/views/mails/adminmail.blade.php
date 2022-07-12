
@component('mail::message')

# Une commande passée
<h4> Information du client:</h4>
    <p>{{ $clt['nom'] }} {{ $clt['prenom'] }}</p>
    <p>{{ $clt['pays'] }} {{ $clt['ville'] }} , {{ $clt['rue'] }}</p>
    <p>{{ $clt['code_postal'] }}</p>
<div>
    <h3>Information commande</h3>
    <table class="table table-bordered text-center">
        <thead  style="color: dark; {{ couleur_principal() }}">
            <tr>
                <th>Identifiant commande</th>
                <th>Date</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $commande->id }}</td>
                <td>{{ $commande->created_at }}</td>
                {{-- <td style="{{ couleur_text_2() }}">{{ number_format ($total, 0, '.', ' ') }} FCFA</td> --}}
            </tr>
        </tbody>
    </table>
</div>
{{ config('app.name') }}

@endcomponent
