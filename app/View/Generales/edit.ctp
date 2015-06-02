<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Generales</h3>
</div>
<?php echo $this->Form->create('Generale', array('action' => 'edit')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Nombre</label>
                <?php echo $this->Form->text('nombre', array('class' => 'form-control', 'required')); ?>         
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-labell">Descripcion</label>
                <?php echo $this->Form->textarea('descripcion', array('class'=>'form-control', 'required'));?>
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>