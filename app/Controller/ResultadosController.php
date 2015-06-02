<?php

class ResultadosController extends AppController {

    public $uses = array('Resultado');

    public function ajax_resultados() {
        $this->layout = 'ajax';
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

}
