<div class="modal" id="modalTweet">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ingrese dia que pasaria por el gato</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/solicitudesController.php" method="POST" enctype="multipart/form-data">
                    
                    <textarea id="form-edit-id" name=""  disabled="" style="resize:none" readonly cols="width" rows="high"required></textarea>
                    <input type="text" name="id_gato" placeholder="escribe la id de arriba ">
                    <input type="text" name="fecha" placeholder="fecha">
                    <input type="text" name="id_user" placeholder="id de usuario">
                    <input type="submit" value="Adoptar">
                </form>
            </div>
        </div>
    </div>
</div>
