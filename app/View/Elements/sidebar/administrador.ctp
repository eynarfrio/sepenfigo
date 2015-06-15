<ul class="nav nav-pills nav-stacked main-menu">
    <li class="nav-header">Menu</li>

    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-plus"></i><span> Pacientes</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'index')); ?>">Listado de pacientes</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Pacientes', 'action' => 'paciente')); ?>">Nuevo Paciente</a></li>
        </ul>
    </li>
    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-wrench"></i><span> Configuraciones</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Examenes', 'action' => 'index')); ?>">Examenes</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Generales', 'action' => 'index')); ?>">Generales</a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Regiones', 'action' => 'index')); ?>">Regiones</a></li>
        </ul>
    </li>
    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-folder-open"></i><span> Tratamientos</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Tratamientos', 'action' => 'index')); ?>">Listado de tratamientos</a></li>
        </ul>
    </li>
    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-tasks"></i><span> Sintomas</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Sintomas', 'action' => 'index')); ?>">Listado de sintomas</a></li>
        </ul>
    </li>
    <li class="accordion">
        <a href="javascript:"><i class="glyphicon glyphicon-zoom-in"></i><span> Observaciones</span></a>
        <ul class="nav nav-pills nav-stacked">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'Observaciones', 'action' => 'index')); ?>">Listado de sintomas</a></li>
        </ul>
    </li>
</ul>