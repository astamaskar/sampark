<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NagarModel;

class NagarController extends BaseController
{
    protected $nagarModel;


    public function __construct()
    {
        $this->nagarModel = new NagarModel();
        helper('form');
    }

    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [
            'page_title' => 'Nagars',
            'nagars' => $this->nagarModel->findAll(),

        ];
        return view('nagar/index', $data);
        }
    }

    public function new()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        return view('nagar/create',['page_title' => 'New Nagar']);
        }
    }

    public function create()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [

            'page_title' => 'Create New Nagar',
            'name' => esc($this->request->getPost('name'))
        ];
        $this->nagarModel->insert($data);
        return redirect()->to('/nagar')->with('success', 'Nagar created successfully');
        }
    }

    public function show($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [
            'page_title' => 'Nagar Details',
            'nagar' => $this->nagarModel->find($id),
        ];
        if ($data['nagar'] == null) {
            return redirect()->to('/nagar');
        }
        return view('nagar/show', $data);
    }
    }

    public function edit($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [
            'page_title' => 'Edit Nagar',
            'nagar' => $this->nagarModel->find($id)
        ];
        if ($data['nagar'] == null) {
            return redirect()->to('/nagar');
        }
        return view('nagar/edit', $data);
    }}

    public function update($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [

            'name' => esc($this->request->getPost('name'))
        ];
        $this->nagarModel->update($id, $data);
        return redirect()->to('/nagar')->with('success', 'Nagar updated successfully');
    }}

    public function delete($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $this->nagarModel->delete($id);
        return redirect()->to('/nagar')->with('success', 'Nagar deleted successfully');
    }}
}
