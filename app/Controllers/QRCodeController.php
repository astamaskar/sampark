<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use SimpleSoftwareIO\QrCode\Generator;
//use Dompdf\Dompdf;
use CodeIgniter\Pagination\Pagination;


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
            $bastiId = $this->request->getVar('basti_id');
            $list = (new KaryakartaModel)->byBasti($bastiId);
            $karyakartas = $this->karyakartaDetails($list);
            $data =
            [
                'karyakartas' => $karyakartas,
                'page_title' => 'Print QR'
            ];
            return view('prints/codelist', $data);

    }

    public function listAll()
    {
            $karyakartas = array();
            $bastiModel = new BastiModel();
            $karyakartaModel = new KaryakartaModel();
            $basti_list = $bastiModel->findAll();
            foreach ($basti_list as $basti)
            {
                $list = $karyakartaModel->byBasti($basti['id']);
                if(count($list) > 0)
                {
                    $kk = $this->karyakartaDetails($list);
                    array_push($karyakartas, $this->karyakartaDetails($list));

                }
            }

            $data =
            [
                'bastis' => $karyakartas,
                'page_title' => 'Print QR'
            ];
            return view('prints/codelistall', $data);

    }

    private function karyakartaDetails($list)
    {
        $dayitva = new DayitvaModel();
        $qrCode = new Generator();
        $karyakartas = [];
        $temp =[];

        foreach ($list as $karyakarta)
        {
        $temp['id'] = $karyakarta['id'];
        $temp['name'] = $karyakarta['name'];
        $temp['mobile'] = $karyakarta['mobile'];
        $temp['basti'] = (new BastiModel)->find($karyakarta['basti_id'])['name'];
        $temp['nagar'] = (new NagarModel)->find((new BastiModel)->find($karyakarta['basti_id'])['nagar_id'])['name'];
        $temp['dayitva'] = $dayitva->where('id', $karyakarta['dayitva_id'])->first()['name'];
        $temp['code'] = $qrCode->size(175)->generate(site_url('AttendeesController/edit/').$karyakarta['id']);
        array_push($karyakartas, $temp);
        }
        return $karyakartas;
    }
}
