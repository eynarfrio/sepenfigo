
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Resultado <?php echo $resultado['Resultado']['descripcion']; ?> <small><?php echo "De " . $resultado['Examene']['nombre']; ?></small></h3>
</div>


<div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->create('Examene', array('action' => 'registra_su_penfigo', 'id' => 'form_resultado')); ?>
        <div class="row">
            <div class="col-md-8">
                <label class="control-label">Penfigo</label>
                <?php echo $this->Form->hidden('PenfigosResultado.resultado_id', array('value' => $resultado['Resultado']['id'])); ?>
                <?php echo $this->Form->select('PenfigosResultado.penfigo_id', $penfigos, array('class' => 'form-control', 'required')); ?>         
            </div>
            <div class="col-md-4">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-info col-md-12" type="submit">REGISTRAR</button>  
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">

            </div>
        </div>
        <?php echo $this->Form->end(); ?>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Penfigo</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penfigos_reg as $re): ?>
                          <tr>
                              <td><?php echo $re['Penfigo']['nombre'] ?></td>
                              <td>
                                  <a class="label-default label label-danger" href="javascript:" onclick="quita_resultado(<?php echo $re['PenfigosResultado']['id']; ?>)">Retirar</a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="button" onclick="resultados(<?php echo $resultado['Resultado']['examene_id']; ?>);">Resultados</button>
</div>

<script>
  $('#form_resultado').submit(function (e) {
      var postData = $('#form_resultado').serializeArray();
      var formURL = $('#form_resultado').attr("action");
      $.ajax(
              {
                  url: formURL,
                  type: "POST",
                  data: postData,
                  /*beforeSend:function (XMLHttpRequest) {
                   alert("antes de enviar");
                   },
                   complete:function (XMLHttpRequest, textStatus) {
                   alert('despues de enviar');
                   },*/
                  success: function (data, textStatus, jqXHR)
                  {
                      if ($.parseJSON(data).correcto != '') {
                          mensaje_noty($.parseJSON(data).correcto, 'topRight', 'success');
                      } else {
                          mensaje_noty("Error!!, No se registro el resultado!!!", 'topRight', 'error');
                      }

                      $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Examenes', 'action' => 'penfigos', $resultado['Resultado']['id'])); ?>');
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
  function quita_resultado(id) {
      if (confirm('Esta seguro de quitar el resultado??')) {

          $("#divmodalcont").load("<?php echo $this->Html->url(array('controller' => 'Examenes', 'action' => 'quita_su_penfigo')); ?>/" + id, function (responseTxt, statusTxt, xhr) {
              if ($.parseJSON(responseTxt).correcto != '') {
                  mensaje_noty($.parseJSON(responseTxt).correcto, 'topRight', 'success');
              } else {
                  mensaje_noty("Error!!, No se quito el resultado!!!", 'topRight', 'error');
              }
              $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Examenes', 'action' => 'penfigos', $resultado['Resultado']['id'])); ?>');
              if (statusTxt == "error")
                  alert("Error: " + xhr.status + ": " + xhr.statusText);
          });
      }
  }
  function resultados(idExamen) {
  $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'ajax_resultados')); ?>/'+idExamen);
  }

</script>