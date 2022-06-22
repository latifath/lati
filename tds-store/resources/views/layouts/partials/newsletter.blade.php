<!-- Subscribe Start -->
<div class="container-fluid my-4" style="{{ couleur1() }}">
    <div class="row justify-content-md-center py-2 px-xl-5">
        <div class="col-md-6 col-12 py-5">
            <div class="text-center mb-2 pb-2">
                <h2 class="section-title px-5 mb-3"><span class="px-2" style="background-color: {{ couleur1('$backgroundcolor_gris') }}">Restez à jour</span></h2>
                <p>Inscrivez-vous pour recevoir les actualités de Tds-store !</p>
            </div>
            <form method="POST" action="{{ route('root_site_public_newsletter') }}">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }} border-white p-4" value="{{ Auth::check() ? auth()->user()->email : '' }}"  name="email" placeholder="Entrez l'email...">
                    <div class="input-group-append">
                     <button class="btn btn-primary px-4" style="{{ couleur2() }}" >S'abonner</button>
                    </div>
                </div>
                {!! $errors->first('email', '<p class="text-danger">:message</p>') !!}
            </form>
        </div>
    </div>
</div>
<!-- Subscribe End -->
