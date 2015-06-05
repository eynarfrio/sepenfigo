<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Listado de pacientes</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre completo</th>
                            <th>Sexo</th>
                            <th>C.i.</th>
                            <th>Telefonos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pacientes as $pa): ?>
                          <tr>
                              <td><?php echo $pa['Paciente']['id']; ?></td>
                              <td><?php echo $pa['Paciente']['nombre_completo']; ?></td>
                              <td><?php echo $pa['Paciente']['sexo']; ?></td>
                              <td><?php echo $pa['Paciente']['ci']; ?></td>
                              <td><?php echo $pa['Paciente']['ambos_telefonos']; ?></td>
                              <td>
                                  <a href="<?php echo $this->Html->url(array('action' => 'verpaciente', $pa['Paciente']['id'])); ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open icon-white"></i> Ver</a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>