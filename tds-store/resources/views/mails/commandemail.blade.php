
@component('mail::message')

# Mr/Mme {{ $clt['nom'] }}
<p>Nous avons recue votre commande!</p>

<div>
    <h3>Adresse info</h3>
<p>{{ $clt['nom'] }} {{ $clt['prenom'] }}</p>
<p> {{ $clt['rue'] }} , {{ $clt['ville'] }} </p>
<p>{{ $clt['code_postal'] }} {{ $clt['pays'] }}</p>
</div>
{{-- <div>
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
            {{-- </tr>
        </tbody>
    </table>
</div>  --}}
{{-- # Button component: --}}

 {{-- @component('mail::button', ['url' => ''])

    Button Text

@endcomponent


# Panel component:

@component('mail::panel')

    This is a panel

@endcomponent --}}


#

@component('mail::table')
<h3> Information commande</h3>


    |  Id           | Date          | total   |

    | |:-------------:| --------:|

    |{{ $commande->id }}  |{{ $commande->created_at }}     |    |

    {{-- | Col 3 is      | Right-Aligned | $20      | --}}

@endcomponent


{{-- # Promotion component:

@component('mail::promotion')

    This is a promotion component

@endcomponent


# Subcopy component:

@component('mail::subcopy')

    This is a subcopy component

@endcomponent --}}


{{-- Thanks, --}}

{{ config('app.name') }}

@endcomponent

{{-- data: [
    'data' = $this->data
] --}}
