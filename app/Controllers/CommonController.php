<?php

namespace App\Controllers;

use App\Models\MohallaModel;
use App\Models\BastiModel;
use App\Models\NagarModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CommonController extends BaseController
{
    public function index()
    {
       // Check if user is logged in
       $session = session();
       if (!$session->get('isLoggedIn')) {
           // If not logged in, redirect to login page
           return redirect()->to('/login');
       } else {
       $model = new MohallaModel();
       $bastiModel = new BastiModel();
       $nagarModel = new NagarModel();
       $mohallas = $model->findAll();

       $mohallax = [];
       $mohallaBastiNagar = [];
       foreach ($mohallas as $mohalla){
           $mohallaBastiNagar['id'] = $mohalla['id'];
           $mohallaBastiNagar['name'] = $mohalla['name'];
           $mohallaBasti = $bastiModel->where('id', $mohalla['basti_id'])->first();
           $mohallaBastiNagar['basti_id'] = $mohallaBasti['id'];
           $mohallaBastiNagar['basti_name'] = $mohallaBasti['name'];
           $bastiNagar = $nagarModel->where('id', $mohallaBasti['nagar_id'])->first();
           $mohallaBastiNagar['nagar_id'] = $bastiNagar['id'];
           $mohallaBastiNagar['nagar_name'] = $bastiNagar['name'];
           array_push($mohallax, $mohallaBastiNagar);
       }

       $data = [
           'page_title' => 'Dashboard',
           'mohallax' => $mohallax,
       ];
        }
    }

    //get basti list dropdown by nagar id
    public function getbasti()
    {
        $bastiModel = new BastiModel();
        $bastiDetails = $bastiModel->where('nagar_id', $this->request->getVar('nagar_id'))->findAll(); // Fetch basti details
        return view('common/_options', ['options' => $bastiDetails]);
    }

    public function getmohalla()
    {
        $mohallaModel = new MohallaModel();
        $mohallaDetails = $mohallaModel->where('basti_id', $this->request->getVar('basti_id'))->findAll(); // Fetch mohalla details
        return view('common/_options', ['options' => $mohallaDetails]);
    }

    //get basti list dropdown by nagar id
    public function getNagarBasti($nagar_id=null)
    {
        $bastiModel = new BastiModel();
        $bastiDetails = $bastiModel->where('nagar_id', $this->request->getVar('nagar_id'))->findAll(); // Fetch basti details
        return view('common/_ul', ['options' => $bastiDetails]);
    }

    public function getToast()
    {
        // Check if flash data exists
        //if (session()->has('success')) {
            // Return the toast element with the flash message
            return view('common/toast', ['message' => 'Hello', 'page_title' => 'Toast']);
        // }
        // Return an empty response if no flash data exists
       // return '';
    }

    public function dashboard()
    {
        // Check if user is logged in
       $session = session();
       if (!$session->get('isLoggedIn')) {
           // If not logged in, redirect to login page
           return redirect()->to('/login');
       } else {
        $mohallamodel = new MohallaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();

        $nagars = $nagarModel->findAll();

        $nagarx = [];
        $nagarBastiMohalla = [];
        $count = 0;

        /* foreach ($nagars as $nagar) {
            $nagarBastiMohalla[++$count]['nagar'] = $nagar['name'];
            $bastis =  $bastiModel->where('nagar_id', $nagar['id'])->findAll(); // Fetch basti details
            foreach ($bastis as $basti){
                $nagarBastiMohalla[$count]['nagar']['basti'] = $basti['name'];
                $mohallas = $mohallaModel->where('basti_id', $basti['id'])->findAll(); // Fetch mohalla details
                foreach ($mohallas as $mohalla){
                    $nagarBastiMohalla[$count]['nagar']['basti']['mohalla']['id'] = $mohalla['id'];
                    $nagarBastiMohalla[$count]['nagar']['basti']['mohalla']['name'] = $mohalla['name'];
                }
            }
            array_push($nagarx, $nagarBastiMohalla);
        } */

        return view('common/dashboard', ['page_title' => 'Dashboard']);
        }
    }
}
