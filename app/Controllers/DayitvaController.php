<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DayitvaModel;

class DayitvaController extends BaseController
{

    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {

            $dayitva = new DayitvaModel();
            $data = [
                'page_title' => 'Dayitva',
                'page_heading' => 'दायित्व सूची',
                'dayitvas' => $dayitva->findAll(),

            ];
            return view('dayitva/index', $data);
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
            return view('dayitva/create',['page_title' => 'New Dayitva', 'page_heading' => 'नया दायित्व']);
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
            $dayitva = new DayitvaModel();
            $data = [

                'page_title' => 'Create New Dayitva',
                'name' => esc($this->request->getPost('name'))
            ];
            if($dayitva->insert($data)) {
                return redirect()->to('/dayitva')->with('success', 'नया दायित्व जोड़ा गया');
            } else {
                return redirect()->to('/dayitva')->with('error', 'Some error occurred. Please try again.');
            }
        }
    }

   /*  public function show($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $data = [
            'page_title' => 'dayitva Details',
            'dayitva' => $this->dayitvaModel->find($id),
        ];
        if ($data['dayitva'] == null) {
            return redirect()->to('/dayitva');
        }
        return view('dayitva/show', $data);
    }
    } */

    public function edit($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $dayitva = new DayitvaModel();
            $data = [
                'page_title' => 'Edit Dayitva',
                'page_heading' => 'दायित्व सम्पादन',
                'dayitva' => $dayitva->find($id)
            ];
            if ($data['dayitva'] == null) {
                return redirect()->to('/dayitva');
            }
            return view('dayitva/edit', $data);
        }
    }

    public function update($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $dayitva = new DayitvaModel();
            $data = [
                'name' => esc($this->request->getPost('name'))
            ];
            if($dayitva->update($id, $data)){
                return redirect()->to('/dayitva')->with('success', 'दायित्व संपादित किया गया');
            } else {
                return redirect()->to('/dayitva')->with('error', 'Some error occurred. Please try again.');
            }
        }
    }

    public function delete($id)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $dayitva = new DayitvaModel();
            if($dayitva->delete($id)){
                return redirect()->to('/dayitva')->with('success', 'दायित्व हटाया गया');
            } else {
                return redirect()->to('/dayitva')->with('error', 'Some error occurred. Please try again.');
            }
        }
    }
}
