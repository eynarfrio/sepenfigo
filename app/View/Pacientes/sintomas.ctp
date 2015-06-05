<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Sintomas del paciente <?php echo $paciente['Paciente']['nombre_completo'] ?> en fecha (<?php echo date('d-m-Y')?>)</h2>
            </div>
            <div class="box-content">

                <?php echo $this->Form->create('Paciente', array('action' => 'registra_sintomas/' . $paciente['Paciente']['id'])); ?>
                <?php $i = 0; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Region</th>
                            <th style="width: 60%;">Sintoma</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($regiones as $re): ?>
                        <?php $idReg = $re['Regione']['id'];?>
                          <tr>
                              <td><?php echo $re['Regione']['nombre'] ?></td>
                              <td>
                                  <?php foreach ($sintomas as $sin): ?>
                                  <?php $idSin = $sin['Sintoma']['id'];?>
                                    <div class="checkbox">
                                        <label>
                                            <?php echo $this->Form->hidden("Sintoma.$idReg.sintoma_id.$idSin.id")?>
                                            <?php echo $this->Form->checkbox("Sintoma.$idReg.sintoma_id.$idSin.valor")?>
                                            <?php echo $sin['Sintoma']['nombre']." (".$sin['Sintoma']['tipo'].")";?>
                                        </label>
                                    </div>
                                  <?php endforeach; ?>
                              </td>
                          </tr>
                          <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <label class="control-label">&nbsp;</label>
                        <?php echo $this->Html->link('Volver', $this->request->referer(), array('class' => 'btn btn-info col-md-12')); ?>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label">&nbsp;</label>
                        <?php echo $this->Form->submit('Registrar', array('class' => 'btn btn-success col-md-12')); ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>