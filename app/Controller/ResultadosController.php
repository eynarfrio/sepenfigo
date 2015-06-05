<?php

class ResultadosController extends AppController {

  public $uses = array('Resultado', 'Examene');
  var $components = array('RequestHandler');

  public function ajax_resultados($idExamen = NULL) {
    $this->layout = 'ajax';
    $resultados = $this->Resultado->find('all', array(
      'conditions' => array('Resultado.examene_id' => $idExamen)
      , 'fields' => array('Resultado.id', 'Examene.nombre', 'Resultado.descripcion'),
      'order' => array('Resultado.id DESC')
    ));
    $examen = $this->Examene->find('first', array(
      'recursive' => -1,
      'conditions' => array('Examene.id' => $idExamen),
      'fields' => array('Examene.nombre')
    ));
    $this->set(compact('resultados', 'idExamen', 'examen'));
  }

  function respond($message = null, $json = false) {
    if ($message != null) {
      if ($json == true) {
        $this->RequestHandler->setContent('json', 'application/json');
        $message = json_encode($message);
      }
      $this->set('message', $message);
    }
    $this->render('message');
  }

  public function registra_resultado() {
    //debug($this->request->data);exit;
    $array['correcto'] = '';
    if (!empty($this->request->data)) {
      $this->Resultado->create();
      if ($this->Resultado->save($this->request->data['Resultado'])) {
        $array['correcto'] = 'Excelente, Se registro correctamente!!!';
      }
    }
    $this->respond($array, true);
  }

  public function quita_resultado($idResultado = NULL) {
    $array['correcto'] = '';
    if ($this->Resultado->delete($idResultado)) {
      $array['correcto'] = 'Excelente, Se quito el resultado correctamente!!!';
    }
    $this->respond($array, true);
  }
  public function edit_sintomas(){
    
  }

}
