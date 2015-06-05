<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Informacion de paciente # <?php echo $paciente['Paciente']['id'] ?></h2>
                <div class="box-icon">
                    <a href="<?php echo $this->Html->url(array('action' => 'paciente', $idPaciente)); ?>" class="btn btn-round btn-default"><i class="glyphicon glyphicon-pencil"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="page-header">
                    <h1><?php echo $paciente['Paciente']['nombre_completo'] ?></h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <b>Edad: </b> <?php //echo $paciente['Paciente']['edad']                    ?>20
                    </div>
                    <div class="col-md-4">
                        <b>Fecha de nacimiento: </b> <?php echo $paciente['Paciente']['fecha_nac'] ?>
                    </div>
                    <div class="col-md-4">
                        <b>C.I.: </b> <?php echo $paciente['Paciente']['ci'] ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <b>Sexo: </b> <?php echo $paciente['Paciente']['sexo'] ?>
                    </div>
                    <div class="col-md-4">
                        <b>Direccion: </b> <?php echo $paciente['Paciente']['direccion'] ?>
                    </div>
                    <div class="col-md-4">
                        <b>Telefonos </b> <?php echo $paciente['Paciente']['ambos_telefonos'] ?>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <b>Ciudad: </b> <?php echo $paciente['Paciente']['ciudad'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Datos Generales del paciente</h2>
                <div class="box-icon">
                    <a href="<?php echo $this->Html->url(array('action' => 'generales', $idPaciente)); ?>" class="btn btn-round btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombre</th>
                            <th>Valor</th>
                            <th>Medico</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($paciente['Generale'] as $ge): ?>
                          <tr>
                              <td><?php echo $ge['PacientesGenerale']['created'] ?></td>
                              <td><?php echo $ge['nombre'] ?></td>
                              <td><?php echo $ge['PacientesGenerale']['valor'] ?></td>
                              <td><?php echo $this->requestAction(array('action' => 'get_nombre_usr', $ge['PacientesGenerale']['user_id'])) ?></td>
                              <td>
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'general', $ge['PacientesGenerale']['id'])); ?>')" class="label-success label label-default">Editar</a> 
                                  <?php echo $this->Html->link("Eliminar", array('action' => 'elimina_pac_gen', $ge['PacientesGenerale']['id']), array('class' => 'label-default label label-danger', 'confirm' => 'Esta seguro de eliminar el examen??')) ?>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Sintomas del paciente</h2>
                <div class="box-icon">
                    <a href="javascript:" class="btn btn-round btn-default" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'edit_sintomas', $idPaciente)); ?>')"><i class="glyphicon glyphicon-pencil"></i></a> 
                    <a href="<?php echo $this->Html->url(array('action' => 'sintomas', $idPaciente, date('Y-m-d'))); ?>" class="btn btn-round btn-default"><i class="glyphicon glyphicon-plus"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Region</th>
                            <th>Sintoma</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pas_sint as $pasi): ?>
                          <tr>
                              <td><?php echo $pasi['PacientesSintoma']['created']; ?></td>
                              <td><?php echo $pasi['Regione']['nombre']; ?></td>
                              <td><?php echo $pasi['Sintoma']['nombre']; ?></td>
                              <td>
                                  <a href="javascript:" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'observaciones', $pasi['PacientesSintoma']['id'], $pasi['Sintoma']['tipo'])); ?>')" class="label-info label label-default">Observaciones</a> 
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Grado de afeccion por areas</h2>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Region</th>
                            <th style="width: 50%;">Grado de afeccion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res_sint as $dats): ?>
                          <?php $grado = ($dats[0]['grado'] / $num_sintomas) * 100; ?>
                          <?php $grado = round($grado, 2) ?>
                          <tr>
                              <td><?php echo $dats[0]['fecha']; ?></td>
                              <td><?php echo $dats['Regione']['nombre']; ?></td>
                              <td>
                                  <div class="progress progress-striped progress-success active">
                                      <div class="progress-bar progress-bar-warning" style="width: <?php echo $grado ?>%;"><?php echo $grado; ?>%</div>
                                  </div>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Pre-Diagnostico Penfigo segun tipo</h2>
            </div>
            <div class="box-content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th style="width: 20%;">Agudo</th>
                            <th style="width: 20%;">Cronico</th>
                            <th>Resultado</th>
                            <th>Examenes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos_fecha as $dfe): ?>
                          <?php $d_agudo = ($this->requestAction(array('action' => 'get_agu_cro', $idPaciente, $dfe[0]['fecha'], 'Agudo')) / $num_t_agudo) * 100; ?>
                          <?php $d_cronico = ($this->requestAction(array('action' => 'get_agu_cro', $idPaciente, $dfe[0]['fecha'], 'Cronico')) / $num_t_cronico) * 100; ?>
                          <?php
                          $d_agudo = round($d_agudo, 2);
                          $d_cronico = round($d_cronico, 2);
                          ?>
                          <tr>
                              <td><?php echo $dfe[0]['fecha']; ?></td>
                              <td>
                                  <div class="progress progress-striped progress-success active">
                                      <div class="progress-bar" style="width: <?php echo $d_agudo; ?>%;"><?php echo $d_agudo; ?>%</div>
                                  </div>
                              </td>
                              <td>
                                  <div class="progress progress-striped progress-success active">
                                      <div class="progress-bar progress-bar-danger" style="width: <?php echo $d_cronico; ?>%;"><?php echo $d_cronico; ?>%</div>
                                  </div>
                              </td>
                              <td>
                                  <?php
                                  if ($d_cronico >= 51) {
                                    echo "CRONICO";
                                  } elseif ($d_agudo >= 51) {
                                    echo "AGUDO";
                                  } elseif ($d_cronico > $d_agudo) {
                                    echo "CRONICO (Posible)";
                                  } elseif ($d_agudo > $d_cronico) {
                                    echo "AGUDO (Posible)";
                                  } else {
                                    echo "INDEFINIDO";
                                  }
                                  ?>
                              </td>
                              <td>
                                  <a href="javascript:" class="label label-success" onclick="cargarmodal('<?php echo $this->Html->url(array('action' => 'examen', $idPaciente, $dfe[0]['fecha'])); ?>')">Examen</a>
                              </td>
                          </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>