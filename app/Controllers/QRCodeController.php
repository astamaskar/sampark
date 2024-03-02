<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use SimpleSoftwareIO\QrCode\Generator;

use App\Models\KaryakartaModel;
use App\Models\DayitvaModel;
use App\Models\NagarModel;
use App\Models\BastiModel;

class QRCodeController extends BaseController
{
    public function index()
    {

    }

    public function printByBasti()
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
                'page_title' => 'Print Karyakarta QR Code',
                'bastis' => $bastiDetails,
                'nagars' => $nagarDetails,

            ];

        }    return view('prints/printByBasti', $data);
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
            $list = (new KaryakartaModel)->byBasti($bastiId);

            $dayitva = new DayitvaModel();

            $qrCode = new Generator();
            $karyakartas = [];
            $temp =[];

            foreach ($list as $karyakarta)
            {
            $temp['id'] = $karyakarta['id'];
            $temp['name'] = $karyakarta['name'];
            $temp['mobile'] = $karyakarta['mobile'];
            $temp['dayitva'] = $dayitva->where('id', $karyakarta['dayitva_id'])->first()['name'];
            $temp['code'] = $qrCode->size(120)->generate(site_url('AttendeesController/edit/').$karyakarta['id']);
            array_push($karyakartas, $temp);
            }
            $data =
            [
                'karyakartas' => $karyakartas,
                'page_title' => 'Print QR'
            ];
            return view('prints/codelist', $data);
        }
    }
}
