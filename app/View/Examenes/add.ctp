<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3>Examenes</h3>
</div>
<?php echo $this->Form->create('Examene',array('action' => 'add'));?>
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
        <div class="control-group">
            <label class="control-label"  for="selectError">Tipo</label>
            <div class="controls">
                <select id="selectError" name="data[Examene][tipo]"  data-rel="chosen" class="form-control">
                    <option value="Biopsia">Biopsia</option>
                    <option value="Fluidos">Fluidos</option>            
                </select>
            </div>              
        </div>
    </div>

</div>
<div class="modal-footer">
    <a href="javascript:" class="btn btn-default" data-dismiss="modal">Close</a>
    <button class="btn btn-primary" type="submit">Registrar</button>
</div>
<?php echo $this->Form->end();?>
