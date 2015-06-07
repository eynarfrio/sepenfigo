<?php

class SintomasController extends AppController {


    public $uses = array('Sintoma');

    public function index() {
        $sintomas = $this->Sintoma->find('all');
        $this->set(compact('sintomas'));
    }

    public function add() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Sintoma->create();
            if ($this->Sintoma->save($this->request->data)) {
                $this->Session->setFlash('Seregistro correctamente', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        }
    }

    public function edit($id = null) {
        $this->layout = 'ajax';
        $this->Sintoma->id = $id;
        if (!$this->Sintoma->exists()) {
            throw new NotFoundException(__('Invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Sintoma->save($this->request->data)) {
                $this->Session->setFlash('Registro exitoso', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        } else {
            $this->request->data = $this->Sintoma->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->Sintoma->id = $id;
        if (!$this->Sintoma->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Sintoma->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}

