<div class="modal" id="modalDeleteTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar Gato</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/galeriaController.php" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿Seguro que desea elminiar este gato?</p>
                    <input type="submit" value="Aceptar">
                </form>
            </div>
        </div>
    </div>
</div>