<?php

class ObservacionesController extends AppController {

    public $uses = array('Observacione');

    public function index() {
        $observaciones = $this->Observacione->find('all');
        $this->set(compact('observaciones'));
    }

    public function add() {
        $this->layout = 'ajax';
        if ($this->request->is('post')) {
            $this->Observacione->create();
            if ($this->Observacione->save($this->request->data)) {
                $this->Session->setFlash('Seregistro correctamente', 'msgbueno');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        }
    }

    public function edit($id = null) {
        $this->layout = 'ajax';
        $this->Observacione->id = $id;
        if (!$this->Observacione->exists()) {
            throw new NotFoundException(__('Invalido'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Observacione->save($this->request->data)) {
                $this->Session->setFlash('Registro exitoso', 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Error al registrar', 'msgerror');
            }
        } else {
            $this->request->data = $this->Observacione->read(null, $id);
        }
    }

    public function delete($id = null) {
        $this->Observacione->id = $id;
        if (!$this->Observacione->exists()) {
            $this->Session->setFlash('No existe.', 'msgerror');
        }
        if ($this->Observacione->delete()) {
            $this->Session->setFlash('se elimino correctamente.', 'msgbueno');
        } else {
            $this->Session->setFlash('no se pudo eliminar.', 'msgerror');
        }
        $this->redirect(array('action' => 'index'));
    }

}
