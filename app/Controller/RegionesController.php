<?php

class RegionesController extends AppController {

    public $uses = array('Regione');

    public function index() {
        $regiones = $this->Regione->find('all');
        $this->set(compact('regiones'));
    }

    public function add() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Regione->create();
            if ($this->Regione->save($this->request->data)) {
                $this->Session->setFlash('Registrado Correctamente', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error el registrar!', 'msgerror');
            }
        }
    }

    public function edit($id = null) {
        $this->layout='ajax';
        $this->Regione->id = $id;
        if (!$this->Regione->exists()) {
            throw new NotFoundException(__('Invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Regione->save($this->request->data)) {
                $this->Session->setFlash('Registro exitoso', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        } else {
            $this->request->data = $this->Regione->read(null, $id);
        }
    }
    
     public function delete($id = null) {
        $this->Regione->id = $id;
        if (!$this->Regione->exists()) {
            $this->Session->setFlash('No existe.','msgerror');
        }
        if ($this->Regione->delete()) {
            $this->Session->setFlash('se elimino correctamente.','msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.','msgerror');
        }
        $this->redirect(array('action' => 'index'));
    } 

}
