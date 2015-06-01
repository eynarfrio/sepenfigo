<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Usuario</h3>
</div>
<?php echo $this->Form->create('User',array('action' => 'guardarusuario'));?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->hidden('id');?>
                <?php echo $this->Form->hidden('role',array('value' => 'Medico'));?>
                <?php echo $this->Form->text('nombre',array('class' => 'form-control','required','placeholder' => 'Ingrese el nombre del usuario'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                <label class="control-label">Usuario</label>
                <?php echo $this->Form->text('username',array('class' => 'form-control','placeholder' => 'Ingrese el Usuario','required'));?>
            </div>
            <div class="col-sm-6">
                <label class="control-label">Password</label>
                <?php echo $this->Form->password('password2',array('class' => 'form-control','placeholder' => 'Ingrese un password','required','value' => ''));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end();?>