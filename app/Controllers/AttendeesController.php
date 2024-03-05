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

        if($attendeesModel->where('karyakarta_id', $id)->findAll())
        {
            return redirect()->to('AttendeesController/new')->with('success', 'You are already registered!');
        }

        $karyakartaModel = new KaryakartaModel();
        $dayitvaModel = new DayitvaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();

        $karyakarta = $karyakartaModel->find($id);
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
        }
    }


    private function attendeeDetails($attendees)
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
        }
            $nagarModel = new NagarModel();
            $bastiModel = new BastiModel();
            $nagarDetails = $nagarModel->findAll();
            $bastiDetails = $bastiModel->where('nagar_id', $nagarDetails[0]['id'])->findAll(); // Fetch basti details
            $data =
            [
                'page_title' => 'Upasthit',
                'bastis' => $bastiDetails,
                'nagars' => $nagarDetails,
            ];

            return view('attendees/searchByBasti', $data);

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
            return view('attendees/searchByNagar', $data);

        }
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

    public function getAttendeescount()
    {
        $kulApekshit = (new KaryakartaModel)->countAll();
        $kulUpasthit = (new AttendeesModel)->countAll();

        $nagarsDistinct = (new AttendeesModel)->distinct()->select('nagar_id')->countAll();
        $bastisDistinct = (new AttendeesModel)->distinct()->select('basti_id')->countAll();

        $nagars = (new NagarModel)->findAll();
        $nagarsCount = 0;
        $bastisCount = 0;
        foreach ($nagars as $nagar)
        {
            $bastis = (new BastiModel)->where('nagar_id', $nagar['id'])->findAll();
            $nagarUpasthit = (new AttendeesModel)->where('nagar_id', $nagar['id'])->countAll();
            $nagarApekshit = 0;
            $bastiCount = 0;
            foreach ($bastis as $basti)
            {
                $bastiUpasthit = (new AttendeesModel)->where('basti_id', $basti['id'])->countAll();
                $bastiApekshit = (new KaryakartaModel)->where('basti_id', $basti['id'])->countAll();
                $nagarApekshit += $bastiApekshit;
                $bastiData[$bastiCount] =
                [
                    'bastiName' => $basti['name'],
                    'bastiUpasthit' => $bastiUpasthit,
                    'bastiApekshit' => $bastiApekshit,
                ];
                ++$bastiCount;
                ++$bastisCount;
            }
            $nagarsData[$nagarsCount] =
            [
                'name' => $nagar['name'],
                'nagarApekshit' => $nagarApekshit,
                'nagarUpasthit' => $nagarUpasthit,
                'bastiCount' => $bastiCount,
                'bastiData' => $bastiData,
            ];
            ++$nagarsCount;
            $data =
            [
                'page_title' => 'Report',
                'nagarsData' => $nagarsData,
                'nagarsDistinct' => $nagarsDistinct,
                'bastisDistinct' => $bastisDistinct,
                'kulApekshit' => $kulApekshit,
                'kulUpasthit' => $kulUpasthit,
                'nagarsCount' => $nagarsCount,
                'bastisCount' => $bastisCount,
            ];
        }
        return view('prints/report', $data);
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
