<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\NagarModel;

class Nagar extends ResourceController
{
    protected $modelName = 'App\Models\NagarModel';
    protected $format    = 'json';

    public function index()
    {
        $nagarModel = new NagarModel();
        $nagars = $nagarModel->findAll();

        return $this->respond($nagars);
    }

    public function create()
    {
        $nagarModel = new NagarModel();
        $data = $this->request->getJSON();
        $nagarModel->insert($data);

        return $this->respondCreated(['message' => 'Nagar created successfully']);
    }

    public function show($id = null)
    {
        $nagarModel = new NagarModel();
        $nagar = $nagarModel->find($id);

        if ($nagar === null) {
            return $this->failNotFound('Nagar not found');
        }

        return $this->respond($nagar);
    }

    public function update($id = null)
    {
        $nagarModel = new NagarModel();
        $data = $this->request->getJSON();
        $nagarModel->update($id, $data);

        return $this->respond(['message' => 'Nagar updated successfully']);
    }

    public function delete($id = null)
    {
        $nagarModel = new NagarModel();
        $nagarModel->delete($id);

        return $this->respondDeleted(['message' => 'Nagar deleted successfully']);
    }
}
