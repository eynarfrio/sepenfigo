<ul class="nav nav-pills nav-stacked main-menu">
    <li class="nav-header">Menu</li>

    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-plus"></i><span> Pacientes</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'index')); ?>">Listado de pacientes</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'paciente')); ?>">Nuevo Paciente</a></li>
        </ul>
    </li>
</ul>