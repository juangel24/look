<div>
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form  action="{{ url('/updateProfiles1/{dataForm1}') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Cambiar foto de perfil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-4">
                        <div class="md-form mb-5">
                        <center><i class="fas fa-camera prefix grey-text"></i>
                            <button class="btn btn-flat" id="btnsubirfoto" type="button">
                            <span class="btnsubirfoto">Subir foto<input type="file" name="profileimages" id="profileimages">
                            </span>
                            </button>
                        </center>     
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-info btn-rounded waves-effect btn-md" data-dismiss="modal" id="btncerrar">Close</button>
                        <button type="submit" class="btn aqua-gradient btn-md" id="btnaceptar">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>