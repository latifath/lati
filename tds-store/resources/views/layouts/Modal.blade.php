
<form action="#" method="post">
    <div class="modal fade" id="DeleteModalCenter" tabindex="-1" aria-labelledby="DeleteModalLabelCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
                <div class="modal-body">
                    @csrf
                    @method('DELETE')
                    <h5 class="text-center">Etes-vous sûr de vouloir supprimer ?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                </div>
           </div>
        </div>
    </div>
</form>
