<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Sintomas</h3>
</div>
<?php echo $this->Form->create('Tratamiento', array('action' => 'add')); ?>
<div class="modal-body">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Descripcion</label>
                <?php echo $this->Form->textarea('descripcion', array('class' => 'form-control', 'required', 'placeholder' => 'Ingrese la descripcion del tratamiento')); ?>         
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <label class="control-label">Tipo de Pefigo</label>
                <?php echo $this->Form->select('Tratamiento.penfigo_tipo', $penfigo_tipo, array('class' => 'form-control', 'required')); ?>
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end(); ?>
