<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Datos generales del paciente <?php echo $paciente['Paciente']['nombre_completo']?></h2>
            </div>
            <div class="box-content">
                <?php echo $this->Form->create('Paciente',array('action' => 'registra_generales/'.$paciente['Paciente']['id']));?>
                <?php $i = 0;?>
                <?php foreach ($generales as $ge):?>
                <?php $valor = '';$idpg = '';?>
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label col-md-12"><?php echo $ge['Generale']['nombre']?></label>
                    </div>
                    <div class="col-md-4">
                        <?php 
                        if(!empty($edita[$ge['Generale']['id']])){
                          $valor = $edita[$ge['Generale']['id']];
                        }
                        if(!empty($edita_id[$ge['Generale']['id']])){
                          $idpg = $edita_id[$ge['Generale']['id']];
                        }
                        ?>
                        <?php echo $this->Form->hidden("PacientesGenerale.$i.id",array('value' => $idpg))?>
                        <?php echo $this->Form->hidden("PacientesGenerale.$i.user_id",array('value' => $this->Session->read('Auth.User.id')))?>
                        <?php echo $this->Form->hidden("PacientesGenerale.$i.generale_id",array('value' => $ge['Generale']['id']))?>
                        <?php echo $this->Form->hidden("PacientesGenerale.$i.paciente_id",array('value' => $paciente['Paciente']['id']))?>
                        <?php echo $this->Form->text("PacientesGenerale.$i.valor", array('class' => 'form-control', 'placeholder' => 'Ingrese el valor', 'required','type' => 'number','step' => 'any','value' => $valor)); ?>
                    </div>
                </div>
                <br>
                <?php $i++;?>
                <?php endforeach;?>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">&nbsp;</label>
                        <?php echo $this->Html->link('Volver a datos del paciente',array('controller' => 'Pacientes','action' => 'paciente',$paciente['Paciente']['id']),array('class' => 'btn btn-warning col-md-12'));?>
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