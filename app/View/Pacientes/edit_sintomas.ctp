<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Listado de sintomas </h3>
</div>


<div class="modal-body">
    <div class="form-group">
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
                        <?php foreach ($d_sintomas as $ob): ?>
                          <tr>
                              <td><?php echo $ob[0]['fecha'] ?></td>
                              <td>
                                  <?php echo $this->Html->link("Editar",array('action' => 'sintomas',$idPaciente,$ob[0]['fecha']),array('class' => 'label-default label label-success'))?> 
                                  <?php echo $this->Html->link("Eliminar",array('action' => 'elimina_sintomas',$idPaciente,$ob[0]['fecha']),array('class' => 'label-default label label-danger','confirm' => 'Esta seguro de eliminar lo sintomas??'))?>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
