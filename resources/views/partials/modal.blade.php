
    <div class="modal fade" id="modalReservar" tabindex="-1" role="dialog" aria-labelledby="modalReservar"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="form-block">
            <form id="contact-form_modal" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control form-contact" placeholder="Tu nombre" id="contact_name_modal"
                    name="contact_name" required />
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control form-contact" placeholder="Tu email" id="contact_email_modal"
                    name="contact_email" required />
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-contact" placeholder="Motivo de la consulta"
                  id="contact_subject_modal" name="contact_subject" required />
              </div>
              <div class="form-group">
                <textarea class="form-control form-contact" id="contact_message_modal" name="contact_message"
                  placeholder="Cuéntanos..." rows="5"></textarea>
              </div>
              <button type="submit" id="submit_contact_modal" class="btn btn-ohfit"><span>Enviar</span></button>
              <button type="button" class="btn btn-ohfit float-right" data-dismiss="modal" aria-label="Close"><span
                  aria-hidden="true">Cancelar</button>
              <div id="response_modal"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>