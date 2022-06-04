<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Gato</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/galeriaController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-nombre" name="nombre"required></textarea>
                    <textarea id="form-edit-edad" name="edad"required></textarea>
                    <textarea id="form-edit-descripcion" name="descripcion" required></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>