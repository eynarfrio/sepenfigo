<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Observaciones <small><?php echo $dat_pac_sin['Sintoma']['nombre']; ?></small></h3>
</div>


<div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->create('Paciente', array('action' => 'registra_obs', 'id' => 'form_obs')); ?>
        <div class="row">
            <div class="col-md-4">
                <label class="control-label">Descripcion</label>        
            </div>
            <div class="col-md-4">
                <?php echo $this->Form->hidden("PacientesSintomasObservacione.pasientessintoma_id", array('value' => $idPacSin)) ?>
                <?php echo $this->Form->select("PacientesSintomasObservacione.observacione_id", $observaciones, array('class' => 'form-control', 'required')) ?>
            </div>
            <div class="col-md-4">
                <button class="btn btn-info col-md-12" type="submit">REGISTRAR</button>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($observaciones_pa as $ob): ?>
                          <tr>
                              <td><?php echo $ob['Observacione']['descripcion'] ?></td>
                              <td>
                                  <a class="label-default label label-danger" href="javascript:" onclick="quita_obs(<?php echo $ob['PacientesSintomasObservacione']['id']; ?>)">Retirar</a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
  $("#form_obs").submit(function (e)
  {
      var postData = $('#form_obs').serializeArray();
      var formURL = $('#form_obs').attr("action");
      $.ajax(
              {
                  url: formURL,
                  type: "POST",
                  data: postData,
                  /*beforeSend:function (XMLHttpRequest) {
                   alert("antes de enviar");
                   },*/
                  complete: function (XMLHttpRequest, textStatus) {
                      $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'observaciones', $idPacSin, $tipo)); ?>');
                  },
                  success: function (data, textStatus, jqXHR)
                  {
                      if ($.parseJSON(data).correcto != '') {
                          mensaje_noty($.parseJSON(data).correcto, 'topRight', 'success');
                      } else {
                          mensaje_noty("Error!!, No se registro el resultado!!!", 'topRight', 'error');
                      }
                      //data: return data from server
                      //$("#parte").html(data);
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //if fails   
                      alert("error");
                  }
              });
      e.preventDefault();
  });

  function quita_obs(id) {
      if (confirm('Esta seguro de quitar el resultado??')) {

          $("#divmodalcont").load("<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'quita_obs')); ?>/" + id, function (responseTxt, statusTxt, xhr) {
              if ($.parseJSON(responseTxt).correcto != '') {
                  mensaje_noty($.parseJSON(responseTxt).correcto, 'topRight', 'success');
              } else {
                  mensaje_noty("Error!!, No se quito el resultado!!!", 'topRight', 'error');
              }
              $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'observaciones', $idPacSin, $tipo)); ?>');
              if (statusTxt == "error")
                  alert("Error: " + xhr.status + ": " + xhr.statusText);
          });
      }
  }

</script>