<?php

namespace App\Controllers;

use App\Models\MohallaModel;
use App\Models\BastiModel;
use App\Models\NagarModel;
use CodeIgniter\Controller;

class MohallaController extends Controller
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
            $mohallaBastiNagar['basti_name'] = $mohallaBasti['name'];
            $mohallaBastiNagar['nagar_name'] = $nagarModel->select('name')->where('id', $mohallaBasti['nagar_id'])->first()['name'];
            array_push($mohallax, $mohallaBastiNagar);
        }

        $data = [
            'page_title' => 'Mohallas',
            'mohallax' => $mohallax,
        ];

        return view('mohalla/index', $data);
    }}

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
        $nagarDetails = $nagarModel->findAll();
        $bastiDetails = $bastiModel->where('nagar_id', $nagarDetails[0]['id'])->findAll(); // Fetch basti details
        $data = [
            'page_title' => 'New Mohalla',
            'bastis' => $bastiDetails,
            'nagars' => $nagarDetails
        ];
        return view('mohalla/create', $data);
    }}

    // Store a newly created resource in storage.
    public function create()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $model = new MohallaModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'basti_id' => $this->request->getPost('basti_id'),
            // Add other fields as needed
        ];
        if($model->insert($data)) {
            return redirect()->to('/mohalla')->with('success', 'Mohalla created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please provide appropriate inputs.');
        }
    }}

    // Display the specified resource.
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

    // Show the form for editing the specified resource.
    public function edit($id = null)
    {
        // Check if user is logged in
        $session = session();
        if (!$session->get('isLoggedIn')) {
            // If not logged in, redirect to login page
            return redirect()->to('/login');
        } else {
        $mohallaModel = new MohallaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();

        $mohalla = $mohallaModel->find($id);
        $basti = $bastiModel->where('id', $mohalla['basti_id'])->first();
        $bastis = $bastiModel->where('nagar_id', $basti['nagar_id'])->findAll();

        $data = [
            'page_title' => 'Edit Mohalla',
            'thisMohalla' => $mohallaModel->find($id),
            'thisBasti' => $bastiModel->where('id', $mohalla['basti_id'])->first(),
            'thisNagar' => $nagarModel->where('id', $basti['nagar_id'])->first(),
            'nagars' => $nagarModel->findAll(),
            'bastis' => $bastis
        ];

        return view('mohalla/edit', $data);
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
        $model = new MohallaModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'basti_id' => $this->request->getPost('basti_id')
            // Add other fields as needed
        ];
        $model->update($id, $data);

        return redirect()->to('/mohalla')->with('success', 'Mohalla updated successfully');
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
        $model = new MohallaModel();
        $model->delete($id);

        return redirect()->to('/mohalla')->with('success', 'Mohalla deleted successfully');
    }}


}
