<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Formulario de paciente</h2>
            </div>
            <div class="box-content">
                <?php echo $this->Form->create('Paciente',array('action' => 'registra_paciente'));?>
                <?php echo $this->Form->hidden("id");?>
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Nombre</label>
                        <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del paciente', 'required')); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Apellido paterno</label>
                        <?php echo $this->Form->text('ap_paterno', array('class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del paciente', 'required')); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Apellido materno</label>
                        <?php echo $this->Form->text('ap_materno', array('class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno del paciente', 'required')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Fecha de nacimiento</label>
                        <?php echo $this->Form->date('fecha_nac', array('class' => 'form-control', 'required')); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Sexo</label>
                        <?php echo $this->Form->select('sexo', array('MASCULINO' => 'MASCULINO', 'FEMENINO' => 'FEMENINO'), array('class' => 'form-control', 'required')); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">C.I.</label>
                        <?php echo $this->Form->text('ci', array('class' => 'form-control', 'required')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">Direccion</label>
                        <?php echo $this->Form->text('direccion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la direccion')); ?>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Celular</label>
                        <?php echo $this->Form->text('celular', array('class' => 'form-control', 'placeholder' => 'Ingrese el celular')); ?>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Telefono</label>
                        <?php echo $this->Form->text('telefono', array('class' => 'form-control', 'placeholder' => 'Ingrese el telefono')); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Ciudad</label>
                        <?php echo $this->Form->select('ciudad', array('La Paz' => 'La Paz', 'El Alto' => 'El Alto'), array('class' => 'form-control', 'required')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">&nbsp;</label>
                        <?php echo $this->Html->link('Listado de Pacientes',array('controller' => 'Pacientes','action' => 'index'),array('class' => 'btn btn-danger col-md-12'));?>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">&nbsp;</label>
                        <?php echo $this->Form->submit('Registrar',array('class' => 'btn btn-success col-md-12'));?>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>