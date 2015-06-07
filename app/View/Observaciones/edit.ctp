<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Observaciones</h3>
</div>
<?php echo $this->Form->create('Observacione', array('action' => 'edit')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-labell">Descripcion</label>
                <?php echo $this->Form->textarea('descripcion', array('class' => 'form-control')); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Tipo</label>
                <?php echo $this->Form->select('tipo', array('Ampolla' => 'Ampolla', 'Erocion' => 'Erocion'), array('class' => 'form-control', 'required')); ?>
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Cerrar</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>

