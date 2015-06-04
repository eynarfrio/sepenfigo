<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Resultados Examenes</h3>
</div>

    <?php echo $this->Form->create('Resultado', array('action' => 'registra_resultado', 'id' => 'form_resultado')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->textarea('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la descripcion')); ?>         
            </div>
        </div>
    </div>
</div>
<div class="box col-md-12">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit" onclick="registra_resultado();">Registrar</button>
</div>

<div class="box col-md-12">

    <div class="box-inner">
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                <thead>
                    <tr>
                        <th>Examen</th>
                        <th>Descripcion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $re): ?>
                        <tr>
                            <td><?php echo $re['Examene']['nombre'] ?></td>
                            <td><?php echo $re['Resultado']['descripcion'] ?></td>
                            <td>
                                <a class="label-default label label-danger" href="javascript:" onclick="quita_resultado(<?php echo $re['Resultado']['id']; ?>)">Retirar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="modal-footer">

</div>

<?php echo $this->Form->end(); ?>
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
                          mensaje_nota('Excelente!!', $.parseJSON(data).correcto);
                      } else {
                          mensaje_nota('Error!!', 'No se registro el resultado!!');
                      }

                      $('#idmodal').load('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'ajax_resultados', $idResultado)); ?>');
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

          $("#idmodal").load("<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'quita_resultado')); ?>/" + idresultado + "/<?php echo $idResultado; ?>", function (responseTxt, statusTxt, xhr) {
              if ($.parseJSON(responseTxt).correcto != '') {
                  mensaje_nota('Excelente!!', $.parseJSON(responseTxt).correcto);
              } else {
                  mensaje_nota('Error!!', 'No se registro el resultado!!');
              }
              $('#idmodal').load('<?php echo $this->Html->url(array('controller' => 'Resultados', 'action' => 'ajax_resultados', $idResultado)); ?>');
              if (statusTxt == "error")
                  alert("Error: " + xhr.status + ": " + xhr.statusText);
          });
      }
  }

</script>