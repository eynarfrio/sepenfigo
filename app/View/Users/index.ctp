<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Usuarios</h2>

                <div class="box-icon">
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'usuario'));?>');" class="btn btn-round btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $us): ?>
                        <tr>
                            <td><?php echo $us['User']['id']?></td>
                            <td><?php echo $us['User']['nombre']?></td>
                            <td><?php echo $us['User']['username']?></td>
                            <td>
                                <a href="javascript:" class="btn btn-info" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'usuario',$us['User']['id']));?>');"><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                  <a href="javascript:" class="btn btn-danger" onclick="if(confirm('Esta seguro de eliminar al usuario <?php echo $us['User']['nombre']?>??')){window.location = '<?php echo $this->Html->url(array('action' => 'delete',$us['User']['id']));?>';}"><i class="glyphicon glyphicon-edit icon-white"></i>Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>