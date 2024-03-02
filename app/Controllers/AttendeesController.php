<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AttendeesModel;
use App\Models\KaryakartaModel;
use App\Models\DayitvaModel;
use App\Models\BastiModel;
use App\Models\NagarModel;


class AttendeesController extends BaseController
{
    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $attendeesModel = new AttendeesModel();
            $attendees = $attendeesModel->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'karyakartax' => $this->attendeeDetails($attendees),
            ];

            return view('attendees/index', $data);
        }
    }

    public function new()
    {
        return view('attendees/create', ['page_title' => 'New Attendees']);
    }

    public function edit($id)
    {

        $attendeesModel = new AttendeesModel();
        $karyakartaModel = new KaryakartaModel();
        $dayitvaModel = new DayitvaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();

        $karyakarta = $karyakartaModel->where('id', $id)->findall()[0];
        if (!$attendeesModel->where('karyakarta_id', $karyakarta['id']))
        {
            $data =
            [
                'karyakarta_id' => $id,
                'basti_id' => $karyakarta['basti_id'],
                'nagar_id' => $bastiModel->where('id', $karyakarta['basti_id'])->first()['nagar_id'],
                'dayitva_id' => $karyakarta['dayitva_id'],
            ];
            if($attendeesModel->insert($data))
            {
                return redirect()->to('AttendeesController/new')->with('success', 'Welcome to Karyakarta Sammelan!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Please provide appropriate inputs.');
            }
        } else {
            return redirect()->to('AttendeesController/new')->with('success', 'You are already registered!');
        }
    }


   /*  public function create()
    {
        echo view('attendees/create', ['page_title' => 'New Attendees']);
    }

    public function show($id)
    {

    }
    */

    public function attendeeDetails($attendees)
    {
        $karyakartaModel = new KaryakartaModel();
        $dayitvaModel = new DayitvaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();
        $karyakartax = [];
        $karyakartaBastiNagar = [];

        foreach ($attendees as $attendee)
        {
            $karyakarta = $karyakartaModel->where('id', $attendee['karyakarta_id'])->findAll()[0];
            $karyakartaBastiNagar['id'] = $karyakarta['id'];
            $karyakartaBastiNagar['name'] = $karyakarta['name'];
            $karyakartaBastiNagar['mobile'] = $karyakarta['mobile'];
            $karyakartaBastiNagar['dayitva'] = $dayitvaModel->where('id', $karyakarta['dayitva_id'])->first()['name'];
            $karyakartaBasti = $bastiModel->where('id', $karyakarta['basti_id'])->first();
            $karyakartaBastiNagar['basti_name'] = $karyakartaBasti['name'];
            $karyakartaBastiNagar['nagar_name'] = $nagarModel->select('name')->where('id', $karyakartaBasti['nagar_id'])->first()['name'];
            array_push($karyakartax, $karyakartaBastiNagar);
        }
        return $karyakartax;
    }

    public function attendeesSearchByBasti()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $nagarModel = new NagarModel();
            $bastiModel = new BastiModel();
            $nagarDetails = $nagarModel->findAll();
            $bastiDetails = $bastiModel->where('nagar_id', $nagarDetails[0]['id'])->findAll(); // Fetch basti details
            $data = [
                'page_title' => 'Upasthit',
                'bastis' => $bastiDetails,
                'nagars' => $nagarDetails,

            ];

        }    return view('attendees/searchByBasti', $data);
    }

    public function attendeesListByBasti()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            //$karyakarta = new KaryakartaModel();
            $bastiId = $this->request->getVar('basti_id');
            $attendeesModel = new AttendeesModel();
            $attendees = $attendeesModel->where('basti_id', $bastiId)->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'karyakartax' => $this->attendeeDetails($attendees),
            ];

            return view('attendees/index', $data);
        }
    }

    public function attendeesSearchByNagar()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $nagarModel = new NagarModel();
            $nagarDetails = $nagarModel->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'nagars' => $nagarDetails,

            ];

        }    return view('attendees/searchByNagar', $data);
    }

    public function attendeesListByNagar()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            //$karyakarta = new KaryakartaModel();
            $nagarId = $this->request->getVar('nagar_id');
            $attendeesModel = new AttendeesModel();
            $attendees = $attendeesModel->where('nagar_id', $nagarId)->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'karyakartax' => $this->attendeeDetails($attendees),
            ];

            return view('attendees/index', $data);
        }
    }

    public function attendeesSearchByDayitva()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $dayitvaModel = new DayitvaModel();
            $dayitvaDetails = $dayitvaModel->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'dayitvas' => $dayitvaDetails,

            ];

        }    return view('attendees/searchByDayitva', $data);
    }

    public function attendeesListByDayitva()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            //$karyakarta = new KaryakartaModel();
            $dayitvaId = $this->request->getVar('dayitva_id');
            $attendeesModel = new AttendeesModel();
            $attendees = $attendeesModel->where('dayitva_id', $dayitvaId)->findAll();

            $data = [
                'page_title' => 'Upasthit',
                'karyakartax' => $this->attendeeDetails($attendees),
            ];

            return view('attendees/index', $data);
        }
    }
 /*   public function update($id)
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
        return redirect()->to('/nagar')->with('success', 'Attendees updated successfully');
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
        return redirect()->to('/nagar')->with('success', 'Attendees deleted successfully');
    }} */
}
