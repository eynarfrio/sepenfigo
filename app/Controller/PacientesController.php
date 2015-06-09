<?php

App::uses('AppController', 'Controller');

class PacientesController extends AppController {

  public $uses = array(
    'Paciente',
    'Generale',
    'PacientesGenerale',
    'User',
    'Regione',
    'Sintoma',
    'PacientesSintoma',
    'PacientesSintomasObservacione',
    'Observacione',
    'Examene',
    'ResultadosPaciente'
  );
  var $components = array('RequestHandler');

  public function index() {
    $pacientes = $this->Paciente->find('all');
    $this->set(compact('pacientes'));
  }

  public function paciente($idPaciente = null) {
    $this->Paciente->id = $idPaciente;
    $this->request->data = $this->Paciente->read();
  }

  public function registra_paciente() {
    if (!empty($this->request->data['Paciente'])) {
      $this->Paciente->create();
      $this->Paciente->save($this->request->data['Paciente']);
      $this->Session->setFlash("Se registro los datos del paciente correctamente!!", 'msgbueno');
      if (empty($this->request->data['Paciente']['id'])) {
        $idPaciente = $this->Paciente->getLastInsertID();
        $this->redirect(array('action' => 'generales', $idPaciente));
      } else {
        $this->redirect(array('action' => 'index'));
      }
    } else {
      $this->Session->setFlash("No se pudo registrar los datos del paciente intente nuevamente!!", 'msgerror');
      $this->redirect($this->referer());
    }
  }

  public function generales($idPaciente = null, $fecha = NULL) {
    $paciente = $this->Paciente->find('first', array(
      'conditions' => array('Paciente.id' => $idPaciente),
      'fields' => array('Paciente.id', 'Paciente.nombre_completo')
    ));
    $edita = $this->PacientesGenerale->find('list', array(
      'fields' => array('generale_id', 'valor'),
      'conditions' => array('paciente_id' => $idPaciente, 'created' => $fecha)
    ));
    $edita_id = $this->PacientesGenerale->find('list', array(
      'fields' => array('generale_id', 'id'),
      'conditions' => array('paciente_id' => $idPaciente, 'created' => $fecha)
    ));
    $generales = $this->Generale->find('all');
    $this->set(compact('generales', 'paciente', 'edita', 'edita_id'));
  }

  public function registra_generales($idPaciente = null) {
    if (!empty($this->request->data['PacientesGenerale'])) {
      $this->PacientesGenerale->saveAll($this->request->data['PacientesGenerale']);
      $this->Session->setFlash("Se registro correctamente los datos generales del paciente!!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se pudo registrar los datos generales del paciente intente nuevamente!!", 'msgbueno');
    }
    $this->redirect(array('action' => 'verpaciente', $idPaciente));
  }

  public function verpaciente($idPaciente = - null) {
    $paciente = $this->Paciente->findByid($idPaciente, null, null, 2);
    $pas_sint = $this->PacientesSintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente),
      'fields' => array('PacientesSintoma.id', 'PacientesSintoma.created', 'Regione.nombre', 'Sintoma.nombre', 'Sintoma.tipo'),
      'order' => array('PacientesSintoma.created')
    ));
    /* debug($paciente);
      exit; */
    $res_sint = $this->PacientesSintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente),
      'group' => array('PacientesSintoma.regione_id', 'DATE(PacientesSintoma.created)'),
      'fields' => array('Regione.nombre', 'COUNT(*) as grado', 'DATE(PacientesSintoma.created) as fecha')
    ));
    $num_sintomas = $this->Sintoma->find('count');
    //debug($num_sintomas);exit;.
    $datos_fecha = $this->PacientesSintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente),
      'group' => array('DATE(PacientesSintoma.created)'),
      'fields' => array('DATE(PacientesSintoma.created) as fecha')
    ));
    $num_t_agudo = $this->Regione->find('count', array(
      'recursive' => -1,
      'conditions' => array('Regione.tipo' => 'Agudo')
    ));
    //debug($num_t_agudo);exit;
    $num_t_cronico = $this->Regione->find('count', array(
      'recursive' => -1,
      'conditions' => array('Regione.tipo' => 'Cronico')
    ));
    $this->set(compact('paciente', 'idPaciente', 'pas_sint', 'res_sint', 'num_sintomas', 'datos_fecha', 'num_t_agudo', 'num_t_cronico'));
  }

  public function get_agu_cro($idPaciente = null, $fecha = null, $tipo = null) {
    $sintomas_reg = $this->PacientesSintoma->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'PacientesSintoma.paciente_id' => $idPaciente,
        'DATE(PacientesSintoma.created)' => $fecha,
        'Regione.tipo' => $tipo
      ),
      'group' => array('PacientesSintoma.regione_id'),
      'fields' => array('count(*) as numero_sin')
    ));
    $num_sintomas = $this->Sintoma->find('count');
    $contador = 0;
    foreach ($sintomas_reg as $sin) {
      if ((($sin[0]['numero_sin'] / $num_sintomas) * 100) >= 51) {
        $contador++;
      }
    }
    return $contador;
  }

  public function get_nombre_usr($idUser = NULL) {
    $user = $this->User->find('first', array(
      'conditions' => array('User.id' => $idUser),
      'recursive' => -1,
      'fields' => array('User.nombre')
    ));
    if (!empty($user)) {
      return $user['User']['nombre'];
    } else {
      return '';
    }
  }

  public function general($idPacGen = null) {
    $this->layout = 'ajax';
    $this->PacientesGenerale->id = $idPacGen;
    $this->request->data = $this->PacientesGenerale->read();
  }

  public function registra_general() {
    $this->PacientesGenerale->create();
    $this->PacientesGenerale->save($this->request->data['PacientesGenerale']);
    $this->Session->setFlash("Se registro correctamente!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function elimina_pac_gen($idPacGen = null) {
    $this->PacientesGenerale->delete($idPacGen);
    $this->Session->setFlash("Se elimino correctamente el examen!!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function sintomas($idPaciente = null, $fecha = null) {
    $regiones = $this->Regione->find('all');
    $paciente = $this->Paciente->find('first', array(
      'conditions' => array('Paciente.id' => $idPaciente),
      'fields' => array('Paciente.id', 'Paciente.nombre_completo')
    ));
    $sintomas = $this->Sintoma->find('all', array(
      'fields' => array('Sintoma.id', 'Sintoma.nombre', 'Sintoma.tipo')
    ));
    $edita['Sintoma'] = array();
    foreach ($regiones as $re) {
      foreach ($sintomas as $sin) {
        $pac_sin = $this->PacientesSintoma->find('first', array(
          'recursive' => -1,
          'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente, 'PacientesSintoma.regione_id' => $re['Regione']['id'], 'PacientesSintoma.sintoma_id' => $sin['Sintoma']['id'], 'DATE(PacientesSintoma.created)' => $fecha)
        ));
        if (!empty($pac_sin)) {
          $edita['Sintoma'][$re['Regione']['id']]['sintoma_id'][$sin['Sintoma']['id']]['valor'] = 1;
          $edita['Sintoma'][$re['Regione']['id']]['sintoma_id'][$sin['Sintoma']['id']]['id'] = $pac_sin['PacientesSintoma']['id'];
        }
      }
    }
    $this->request->data = $edita;
    /* debug($pac_sin);
      exit; */
    $this->set(compact('regiones', 'paciente', 'idPaciente', 'sintomas', 'fecha'));
  }

  public function registra_sintomas($idPaciente = null) {
    /* debug($this->request->data);
      exit; */
    $datos = $this->request->data;
    $pac_sin['user_id'] = $this->Session->read('Auth.User.id');
    $pac_sin['paciente_id'] = $idPaciente;
    foreach ($datos['Sintoma'] as $idReg => $da) {
      foreach ($da['sintoma_id'] as $idSin => $sin) {
        if ($sin['valor'] == 1) {
          $pac_sin['id'] = $sin['id'];
          $pac_sin['created'] = $sin['created'];
          $pac_sin['sintoma_id'] = $idSin;
          $pac_sin['regione_id'] = $idReg;
          $this->PacientesSintoma->create();
          $this->PacientesSintoma->save($pac_sin);
        } else {
          if (!empty($sin['id'])) {
            $this->PacientesSintoma->delete($sin['id']);
          }
        }
      }
    }
    $this->Session->setFlash("Se registro correctamente los sintomas!!", 'msgbueno');
    $this->redirect(array('action' => 'verpaciente', $idPaciente));
  }

  public function observaciones($idPacSin = null, $tipo = null) {
    $this->layout = 'ajax';
    $dat_pac_sin = $this->PacientesSintoma->find('first', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintoma.id' => $idPacSin),
      'fields' => array('Sintoma.nombre')
    ));
    $observaciones_pa = $this->PacientesSintomasObservacione->find('all', array(
      'recursive' => 0,
      'conditions' => array('PacientesSintomasObservacione.pasientessintoma_id' => $idPacSin),
      'fields' => array('PacientesSintomasObservacione.id', 'Observacione.descripcion')
    ));
    $observaciones = $this->Observacione->find('list', array(
      'conditions' => array('Observacione.tipo' => $tipo),
      'fields' => 'Observacione.descripcion'
    ));
    $this->set(compact('observaciones_pa', 'observaciones', 'dat_pac_sin', 'idPacSin', 'tipo'));
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

  public function registra_obs() {
    $array['correcto'] = '';
    if (!empty($this->request->data)) {
      $this->PacientesSintomasObservacione->create();
      if ($this->PacientesSintomasObservacione->save($this->request->data['PacientesSintomasObservacione'])) {
        $array['correcto'] = "Se registro correctamente la observacion!!!";
      }
    }
    $this->respond($array, true);
  }

  public function quita_obs($id = null) {
    $array['correcto'] = '';
    if ($this->PacientesSintomasObservacione->delete($id)) {
      $array['correcto'] = 'Excelente, Se quito la observacion correctamente!!!';
    }
    $this->respond($array, true);
  }

  public function edit_sintomas($idPaciente = null) {
    $d_sintomas = $this->PacientesSintoma->find('all', array(
      'recursive' => -1,
      'conditions' => array('PacientesSintoma.paciente_id' => $idPaciente),
      'group' => array('DATE(PacientesSintoma.created)'),
      'fields' => array('DATE(PacientesSintoma.created) as fecha')
    ));
    $this->set(compact('d_sintomas', 'idPaciente'));
  }

  public function elimina_sintomas($idPaciente = null, $fecha = null) {
    $this->PacientesSintoma->deleteAll(array(
      'PacientesSintoma.paciente_id' => $idPaciente,
      'DATE(PacientesSintoma.created)' => $fecha,
      'PacientesSintoma.diagnostico_id' => NULL
    ));
    $this->Session->setFlash("Se elimino correctamente los sintomas de fecha " . $fecha, 'msgbueno');
    $this->redirect(array('action' => 'verpaciente', $idPaciente));
  }

  public function examenes($idPaciente = null, $fecha = null) {
    $paciente = $this->Paciente->find('first', array(
      'conditions' => array('Paciente.id' => $idPaciente),
      'fields' => array('Paciente.id', 'Paciente.nombre_completo')
    ));
    $examenes = $this->Examene->find('all', array('recursive' => 1));
    
    $edita['Resultado'] = array();
    foreach ($examenes as $ex) {
      foreach ($ex['Resultado'] as $re) {
        $pac_res = $this->ResultadosPaciente->find('first', array(
          'recursive' => -1,
          'conditions' => array('ResultadosPaciente.paciente_id' => $idPaciente, 'ResultadosPaciente.resultado_id' => $re['id'], 'ResultadosPaciente.fecha' => $fecha)
        ));
        if (!empty($pac_res)) {
          $edita['Resultado'][$ex['Examene']['id']]['resultado_id'][$re['id']]['tiene'] = 1;
          $edita['Resultado'][$ex['Examene']['id']]['resultado_id'][$re['id']]['valor'] = $pac_res['ResultadosPaciente']['valor'];
          $edita['Resultado'][$ex['Examene']['id']]['resultado_id'][$re['id']]['id'] = $pac_res['ResultadosPaciente']['id'];
        }
      }
    }
    $this->request->data = $edita;
    $this->set(compact('paciente', 'examenes', 'fecha'));
  }

  public function registra_examenes($idPaciente = null) {
    /* debug($this->request->data);
      exit; */
    $idUser = $this->Session->read('Auth.User.id');
    $datos = $this->request->data;
    foreach ($datos['Resultado'] as $ex) {
      foreach ($ex['resultado_id'] as $idRes => $re) {
        if ($re['tiene'] == 1) {
          $pac_res['id'] = $re['id'];
          $pac_res['fecha'] = $re['fecha'];
          $pac_res['resultado_id'] = $idRes;
          $pac_res['paciente_id'] = $idPaciente;
          if (!empty($re['valor'])) {
            $pac_res['valor'] = $re['valor'];
          }
          $pac_res['user_id'] = $idUser;
          $this->ResultadosPaciente->create();
          $this->ResultadosPaciente->save($pac_res);
        } else {
          if (!empty($re['id'])) {
            $this->ResultadosPaciente->delete($re['id']);
          }
        }
      }
    }
    $this->Session->setFlash("Se registro correctamente los examenes!!", 'msgbueno');
    $this->redirect(array('action' => 'verpaciente', $idPaciente));
  }

}
