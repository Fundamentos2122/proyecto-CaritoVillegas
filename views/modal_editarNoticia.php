<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Noticia</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/noticiasController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-titulo" name="titulo"required></textarea>
                    <textarea id="form-edit-descripcion" name="descripcion" required></textarea>
                    <textarea id="form-edit-completa" name="completa" required></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>