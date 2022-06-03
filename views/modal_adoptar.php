<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>ADOPCION</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/solicitudesController.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-id_gato" name="id_gato"  required></textarea>
                    <textarea id="form-edit-id_user" name="id_user"  required ></textarea>
                    <!--<textarea id="form-edit-fecha" name="fecha"  ></textarea>-->
                    <textarea id="form-edit-aceptada" name="aceptada"  required></textarea>
                    <input type="submit" value="Adoptar">
                </form>
            </div>
        </div>
    </div>
</div>
