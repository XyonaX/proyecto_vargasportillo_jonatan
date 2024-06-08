<?php

namespace App\Controllers;

use App\Models\Consulta_model;

class Consultas extends BaseController {

    public function index() {
        $session = session();
        $data['isLoggedIn'] = $session->get('isLoggedIn');
        $data['rol_id'] = $session->get('rol_id');
        $data['usuario_nombre'] = $session->get('usuario_nombre');

        $consultasData = $this->show_consults();

        $data['consultas'] = $consultasData['consultas'];
        $data['pager'] = $consultasData['pager'];
        $data['titulo'] = 'Consultas';

        return view('templates/header', $data)
            . view('consultas', $data)
            . view('templates/footer');
    }

    public function show_consults() {
        $consultaModel = new Consulta_model();
        $pager = \Config\Services::pager();
        $request = \Config\Services::request();

        $perPage = 10;
        $currentPage = $request->getVar('page') ?: 1;

        $consultas = $consultaModel->paginate($perPage, 'default', $currentPage);
        $pager = $consultaModel->pager;
        $pager->setPath('consultas');

        return [
            'consultas' => $consultas,
            'pager' => $pager
        ];
    }

    public function toggle_visto($id) {
        $consultaModel = new Consulta_model();
        $consulta = $consultaModel->find($id);

        if ($consulta) {
            $newStatus = $consulta['consultas_visto'] ? 0 : 1;
            $consultaModel->update($id, ['consultas_visto' => $newStatus]);
            return redirect()->to('/consultas')->with('success', 'Estado de consulta actualizado correctamente');
        } else {
            return redirect()->to('/consultas')->with('error', 'Consulta no encontrada');
        }
    }
}
