<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Region</h3>
</div>
<?php echo $this->Form->create('Regione',array('action' => 'add'));?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->text('nombre',array('class' => 'form-control','required','placeholder' => 'Ingrese el nombre de la region'));?>         
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Descripcion</label>
                <?php echo $this->Form->text('descripcion', array('class'=>'form-control','required','placeholder'=>'Ingresar la descripcion'));?>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end();?>
