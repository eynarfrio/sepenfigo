<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Resultados <small><?php echo $examen['Examene']['nombre']; ?></small></h3>
</div>


<div class="modal-body">
    <div class="form-group">
        <?php echo $this->Form->create('Resultado', array('action' => 'registra_resultado', 'id' => 'form_resultado')); ?>
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Descripcion</label>
                <?php echo $this->Form->hidden('examene_id', array('value' => $idExamen)); ?>
                <?php echo $this->Form->text('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la descripcion del examen')); ?>         
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">&nbsp;</label>
                <button class="btn btn-info col-md-12" type="button" onclick="registra_resultado();">REGISTRAR</button>    
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
                        <?php foreach ($resultados as $re): ?>
                          <tr>
                              <td><?php echo $re['Resultado']['descripcion'] ?></td>
                              <td>
                                  <a class="label-default label label-success" href="javascript:" onclick="penfigos(<?php echo $re['Resultado']['id']; ?>)">penfigos</a>
                                  <a class="label-default label label-danger" href="javascript:" onclick="quita_resultado(<?php echo $re['Resultado']['id']; ?>)">Retirar</a>
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

  function registra_resultado() {
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

                      $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'ajax_resultados', $idExamen)); ?>');
                      //data: return data from server
                      //$("#parte").html(data);
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      //if fails   
                      alert("error");
                  }
              });
  }
  function quita_resultado(idresultado) {
      if (confirm('Esta seguro de quitar el resultado??')) {

          $("#divmodalcont").load("<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'quita_resultado')); ?>/" + idresultado, function (responseTxt, statusTxt, xhr) {
              if ($.parseJSON(responseTxt).correcto != '') {
                  mensaje_noty($.parseJSON(responseTxt).correcto, 'topRight', 'success');
              } else {
                  mensaje_noty("Error!!, No se quito el resultado!!!", 'topRight', 'error');
              }
              $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'ajax_resultados', $idExamen)); ?>');
              if (statusTxt == "error")
                  alert("Error: " + xhr.status + ": " + xhr.statusText);
          });
      }
  }
  function penfigos(idresultado){
    $('#divmodalcont').load('<?php echo $this->Html->url(array('controller' => 'Examenes','action' => 'penfigos'));?>/'+idresultado);
  }

</script>