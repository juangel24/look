<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-default">
                <h5 class="modal-title white-text"><i class="fas fa-pen mr-2"></i>Escribir un nuevo mensaje</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close white-text">
                  <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <input placeholder="Escribe el nombre del usuario" type="text" id="msg-to" class="form-control">
                    <label for="msg-to" class="active">Para</label>
                    <div id="msg-to-result" class="d-flex flex-column"></div>
                </div>

                <div id="selected-users" class="d-flex flex-wrap"></div>

                <div class="md-form">
                    <textarea id="msg-content" class="md-textarea form-control" rows="3"></textarea>
                    <label for="msg-content">Mensaje</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default">Enviar</button>
            </div>
        </div>
    </div>
</div>
<!--<div class="text-center">
  <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">Launch
    Modal Login Form</a>
</div>-->
