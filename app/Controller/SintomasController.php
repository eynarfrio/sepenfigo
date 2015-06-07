<?php

class SintomasController extends AppController {
    public $uses = array('Sintoma');
    
    public  function index(){
        $sintomas = $this->Sintoma->find('all');
        $this->set(compact('sintomas'));
    }
    
    public function add (){
        $this->layout='ajax';
        if($this->request->is('post')){
            $this->Sintoma->create();
            if($this->Sintoma->save($this->request->data)){
                $this->Session->setFlash('Seregistro correctamente','msgbueno');
                return $this->redirect(array('action'=>'index'));
            }else{
                $this->Session->setFlash('Error al registrar','msgerror');
            }
        }
    }
    
    
}