<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Informacion de paciente # <?php echo $paciente['Paciente']['id'] ?></h2>
            </div>
            <div class="box-content">
                <div class="page-header">
                    <h1><?php echo $paciente['Paciente']['nombre_completo'] ?></h1>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <b>Edad: </b> <?php //echo $paciente['Paciente']['edad']   ?>20
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
                                <?php foreach ($paciente['Generale'] as $ge):?>
                                <tr>
                                    <td><?php echo $ge['PacientesGenerale']['created']?></td>
                                    <td><?php echo $ge['nombre']?></td>
                                    <td><?php echo $ge['PacientesGenerale']['valor']?></td>
                                    <td><?php //echo $ge['']['']?></td>
                            </tr>
                            <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>