<?php

namespace App\Controllers;

use App\Models\KaryakartaModel;
use App\Models\DayitvaModel;
use App\Models\BastiModel;
use App\Models\NagarModel;
use CodeIgniter\Controller;

class KaryakartaController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {

            $model = new KaryakartaModel();
            $karyakartas = $model->findAll();

            $karyakartax = $this->karyakartaDetails($karyakartas);

            $data = [
                'page_title' => 'Karyakarta',
                'karyakartax' => $karyakartax,
            ];

            return view('karyakarta/index', $data);
        }
    }

    private function karyakartaDetails($karyakartas)
    {
            $model = new KaryakartaModel();
            $dayitvaModel = new DayitvaModel();
            $bastiModel = new BastiModel();
            $nagarModel = new NagarModel();
            $karyakartax = [];
            $karyakartaBastiNagar = [];
            foreach ($karyakartas as $karyakarta){
                $karyakartaBastiNagar['id'] = $karyakarta['id'];
                $karyakartaBastiNagar['name'] = $karyakarta['name'];
                $karyakartaBastiNagar['mobile'] = $karyakarta['mobile'];
                $karyakartaBastiNagar['dayitva'] = $dayitvaModel->where('id', $karyakarta['dayitva_id'])->first()['name'] ?? "";
                $karyakartaBasti = $bastiModel->where('id', $karyakarta['basti_id'])->first();
                $karyakartaBastiNagar['basti_name'] = $karyakartaBasti['name'];
                $karyakartaBastiNagar['nagar_name'] = $nagarModel->select('name')->where('id', $karyakartaBasti['nagar_id'])->first()['name'];
                array_push($karyakartax, $karyakartaBastiNagar);
            }
            return $karyakartax;
    }

    // Show the form for creating a new resource.
    public function new()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $nagarModel = new NagarModel();
            $bastiModel = new BastiModel();
            $dayitvaModel = new DayitvaModel();
            $dayitvaDetails = $dayitvaModel->findAll();
            $nagarDetails = $nagarModel->findAll();
            $bastiDetails = $bastiModel->where('nagar_id', $nagarDetails[0]['id'])->findAll(); // Fetch basti details
            $data = [
                'page_title' => 'New Karyakarta',
                'bastis' => $bastiDetails,
                'nagars' => $nagarDetails,
                'dayitvas' => $dayitvaDetails
            ];
            return view('karyakarta/create', $data);
        }
    }

    // Store a newly created resource in storage.
    public function create()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $model = new karyakartaModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'mobile' => $this->request->getPost('mobile'),
                'basti_id' => $this->request->getPost('basti_id'),
                'dayitva_id' => $this->request->getPost('dayitva_id'),
                // Add other fields as needed
            ];
            if($model->insert($data)) {
                return redirect()->to('/karyakarta')->with('success', 'Karyakarta created successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Please provide appropriate inputs.');
            }
        }
    }

   /*  // Display the specified resource.
    public function show($id = null)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $model = new BastiModel();
        $data['basti'] = $model->find($id);

        return view('basti/show', $data);
    }}
 */
    // Show the form for editing the specified resource.
    public function edit($id = null)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $karyakartaModel = new KaryakartaModel();
        $bastiModel = new BastiModel();
        $dayitvaModel = new DayitvaModel();
        $nagarModel = new NagarModel();

        $karyakarta = $karyakartaModel->find($id);
        $basti = $bastiModel->where('id', $karyakarta['basti_id'])->first();
        $bastis = $bastiModel->where('nagar_id', $basti['nagar_id'])->findAll();

        $data = [
            'page_title' => 'Edit karyakarta',
            'thiskaryakarta' => $karyakartaModel->find($id),
            'thisBasti' => $bastiModel->where('id', $karyakarta['basti_id'])->first(),
            'thisNagar' => $nagarModel->where('id', $basti['nagar_id'])->first(),
            'thisDayitva' => $dayitvaModel->where('id', $karyakarta['dayitva_id'])->first(),
            'nagars' => $nagarModel->findAll(),
            'bastis' => $bastis,
            'dayitvas' => $karyakartaModel->findAll(),
        ];

        return view('karyakarta/edit', $data);
    }}

    // Update the specified resource in storage.
    public function update($id = null)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $model = new karyakartaModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'mobile' => $this->request->getPost('mobile'),
                'basti_id' => $this->request->getPost('basti_id'),
                'dayitva_id' => $this->request->getPost('dayitva_id'),
            ];
            if($model->update($id, $data)){
                return redirect()->to('/karyakarta')->with('success', 'Karyakarta updated successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Please provide appropriate inputs.');
            }
    }}

    // Remove the specified resource from storage.
    public function delete($id = null)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $model = new karyakartaModel();
        $model->delete($id);

        return redirect()->to('/karyakarta')->with('success', 'karyakarta deleted successfully');
    }}

    //Show by nagar
    public function searchByNagar()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
                $nagarDetails = (new NagarModel)->findAll();

            $data = [
                'page_title' => 'Karyakarta',
                'nagars' => $nagarDetails,

            ];
            return view('karyakarta/searchByNagar', $data);

        }
    }

    public function listByNagar()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            //$karyakarta = new KaryakartaModel();
            $nagarId = $this->request->getVar('nagar_id');
            $bastiId = (new BastiModel)->where('nagar_id', $nagarId)->findAll();
            $bastis = array_column($bastiId, 'id');
            $karyakartas = (new karyakartaModel)->havingIn('basti_id', $bastis)->findAll();
            $data = [
                'page_title' => 'Karyakarta',
                'karyakartax' => $this->karyakartaDetails($karyakartas),
            ];

            return view('karyakarta/index', $data);
        }
    }

    public function searchByBasti()
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
                'page_title' => 'Karyakarta',
                'bastis' => $bastiDetails,
                'nagars' => $nagarDetails,
            ];

            return view('karyakarta/searchByBasti', $data);

    }

    public function listByBasti()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            //$karyakarta = new KaryakartaModel();
            $bastiId = $this->request->getVar('basti_id');
            $karyakartas = (new karyakartaModel)->where('basti_id', $bastiId)->findAll();

            $data = [
                'page_title' => 'Karyakarta',
                'karyakartax' => $this->karyakartaDetails($karyakartas),
            ];

            return view('karyakarta/index', $data);
        }
    }

    public function searchByDayitva()
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
                'page_title' => 'Karyakarta',
                'dayitvas' => $dayitvaDetails,

            ];

        }    return view('karyakarta/searchByDayitva', $data);
    }

    public function listByDayitva()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
            $karyakartaModel = new KaryakartaModel();
            $dayitvaId = $this->request->getVar('dayitva_id');
            $karyakarta = $karyakartaModel->where('dayitva_id', $dayitvaId)->findAll();

            $data = [
                'page_title' => 'Karyakarta',
                'karyakartax' => $this->karyakartaDetails($karyakarta),
            ];

            return view('karyakarta/index', $data);
        }
    }
}
