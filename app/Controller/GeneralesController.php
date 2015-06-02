<?php

class GeneralesController extends AppController {

    public $uses = array('Generale');

    public function index() {
        $generales = $this->Generale->find('all');
        $this->set(compact('generales'));
    }

    //Funcion Insertar un nuevo general
    public function add() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Generale->create();
            if ($this->Generale->save($this->request->data)) {
                $this->Session->setFlash('Registrado Correctamente', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error el registrar!', 'msgerror');
            }
        }
    }

    //Funcion editar general
    public function edit($id = null) {
        $this->layout = 'ajax';
        $this->Generale->id = $id;
        if (!$this->Generale->exists()) {
            throw new NotFoundException(__('Invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Generale->save($this->request->data)) {
                $this->Session->setFlash('Registro exitoso', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        } else {
            $this->request->data = $this->Generale->read(null, $id);
        }
    }

    //Funcion eliminar Ezamen
    public function delete($id = null) {
        $this->Generale->id = $id;
        if (!$this->Generale->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Generale->delete()) {
            $this->Session->setFlash('Se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
