<?php

class ResultadosController extends AppController {

    public $uses = array('Resultado', 'Examene');
    var $components = array('RequestHandler');

    public function ajax_resultados($idResultado = NULL) {
        $this->layout = 'ajax';
        $resultados = $this->Resultado->find('all', array(
            'conditions' => array('Resultado.examene_id' => $idResultado)
            , 'fields' => array('Resultado.id', 'Examene.nombre', 'Resultado.descripcion')
        ));
        //debug('resultadosd');exit;
        // debug('resultados'); exit;
        $this->set(compact('resultados'));
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
        $array['correcto'] = '';
        if (!empty($this->request->data)) {
            $this->Resultado->create();
            if ($this->Resultado->save($this->request->data['Resultado'])) {
                $array['correcto'] = 'Se registro correctamente!!!';
            }
        }
        $this->respond($array, true);
    }

    public function quita_resultado($idResultado = NULL, $idResultado = NULL) {
        $array['correcto'] = '';
        if ($this->Resultado->delete($idResultado)) {
            $array['correcto'] = 'Se quito el resultado correctamente!!!';
        }
        $this->respond($array, true);
    }

}
