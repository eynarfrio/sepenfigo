<?php

class TratamientosController extends AppController {

    public $uses = array('Tratamiento', 'Penfigo');

    public function index() {
        $tratamientos = $this->Tratamiento->find('all');
        $this->set(compact('tratamientos'));
    }

    //funcion insertar nuevo tratamiento
    public function add() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Tratamiento->create();
            if ($this->Tratamiento->save($this->request->data)) {
                $this->Session->setFlash('Se Registro correctamente', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('No se pudo registrar!!', 'msgerror');
            }
        }
        $penfigo_tipo = $this->Penfigo->find('list', array('fields' => 'nombre'));
        $this->set(compact('penfigo_tipo'));
    }

    public function edit($id = null) {
        $this->layout = 'ajax';
        $this->Tratamiento->id = $id;
        if (!$this->Tratamiento->exists()) {
            throw new NotFoundException(__('Invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Tratamiento->save($this->request->data)) {
                $this->Session->setFlash('Registro exitoso', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        } else {
            $this->request->data = $this->Tratamiento->read(null, $id);
        }
        $penfigo_tipo = $this->Penfigo->find('list', array('fields' => 'nombre'));
        $this->set(compact('penfigo_tipo'));
    }

    public function delete($id = null) {
        $this->Tratamiento->id = $id;
        if (!$this->Tratamiento->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Tratamiento->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
