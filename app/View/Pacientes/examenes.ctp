<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Examenes del paciente <?php echo $paciente['Paciente']['nombre_completo'] ?> en fecha (<?php echo date('d-m-Y') ?>)</h2>
            </div>
            <div class="box-content">
                <?php echo $this->Form->create('Paciente', array('action' => 'registra_examenes/' . $paciente['Paciente']['id'])); ?>
                <?php $i = 0; ?>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Examen</th>
                            <th style="width: 65%;">Resultados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($examenes as $ex): ?>
                          <?php $idExa = $ex['Examene']['id']; ?>
                          <tr>
                              <td><?php echo $ex['Examene']['nombre']; ?></td>
                              <td>
                                  <?php foreach ($ex['Resultado'] as $re): ?>
                                    <?php $idRes = $re['id']; ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="checkbox">
                                                <label>
                                                    <?php echo $this->Form->hidden("Resultado.$idExa.resultado_id.$idRes.id") ?>
                                                    <?php echo $this->Form->hidden("Resultado.$idExa.resultado_id.$idRes.fecha", array('value' => $fecha)) ?>
                                                    <?php echo $this->Form->checkbox("Resultado.$idExa.resultado_id.$idRes.tiene"); ?>
                                                    <?php echo $re['descripcion']; ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <?php if ($ex['Examene']['tipo'] == 'Fluidos'): ?>
                                              <?php echo $this->Form->text("Resultado.$idExa.resultado_id.$idRes.valor", array('class' => 'form-control', 'placeholder' => 'Valor del resultado')); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                  <?php endforeach; ?>
                              </td>
                          </tr>
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