
<?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
<fieldset>
    <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
        <?php echo $this->Form->text('username',array('class' => 'form-control','placeholder' => 'Ingrese su Usuario'));?>
    </div>
    <div class="clearfix"></div><br>

    <div class="input-group input-group-lg">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
        <?php echo $this->Form->password('password',array('class' => 'form-control','placeholder' => 'Ingerse el password'));?>
    </div>
    <div class="clearfix"></div>

    <div class="clearfix"></div>

    <p class="center col-md-5">
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </p>
</fieldset>
<?php echo $this->Form->end(); ?>