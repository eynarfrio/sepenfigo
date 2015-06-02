<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i>Generales</h2>

                <div class="box-icon">
                    <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'add')); ?>');" class="btn btn-round btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($generales as $gen): ?>
                            <tr>
                                <td><?php echo $gen['Generale']['id'] ?></td>
                                <td><?php echo $gen['Generale']['nombre'] ?></td>
                                <td><?php echo $gen['Generale']['descripcion'] ?></td>
                                <td>
                                    <a href="javascript:" class="btn btn-info" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'edit', $gen['Generale']['id'])); ?>');"><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a>
                                    <a href="javascript:" class="btn btn-danger" onclick="if (confirm('Esta seguro de eliminar <?php echo $gen['Generale']['nombre'] ?>??')) {
                                                  window.location = '<?php echo $this->Html->url(array('action' => 'delete', $gen['Generale']['id'])); ?>';
                                              }"><i class="glyphicon glyphicon-edit icon-white"></i>Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>