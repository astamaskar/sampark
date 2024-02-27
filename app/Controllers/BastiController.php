<?php

namespace App\Controllers;

use App\Models\BastiModel;
use App\Models\NagarModel;
use CodeIgniter\Controller;

class BastiController extends Controller
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
        $model = new BastiModel();
        $nagarModel = new NagarModel();
        $bastis = $model->findAll();
        /* $db = \Config\Database::connect();

        $query = $db->table('basti')
                    ->select('basti.name as basti_name, nagar.name as nagar_name')
                    ->join('nagar', 'basti.nagar_id = nagar.id')
                    ->get(); */

        $bastix = [];
        $bastiNagar = [];
        foreach ($bastis as $basti){
            $bastiNagar['id'] = $basti['id'];
            $bastiNagar['basti_name'] = $basti['name'];
            $bastiNagar['nagar_name'] = $nagarModel->select('name')->where('id', $basti['nagar_id'])->first()['name'];
            array_push($bastix, $bastiNagar);
        }

        $data = [
            'page_title' => "Bastis",
            //'result' => $query->getResult(),
            'bastis' => $bastis,
            'bastix' => $bastix,
            //'nagarbastis' => $nagarbastis
        ];

        return view('basti/index', $data);
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
        $nagarDetails = $nagarModel->findAll(); // Fetch Nagar details
        return view('basti/create', ['nagars' => $nagarDetails, 'page_title' => 'New Basti']);
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
        $model = new BastiModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'nagar_id' => $this->request->getPost('nagar_id'),
            // Add other fields as needed
        ];
        $model->insert($data);

        return redirect()->to('/basti')->with('success', 'Basti created successfully');
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
        $data = [
            'page_title' => 'Basti Details',
            'basti' => $model->find($id),
        ];

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
        $model = new BastiModel();
        $nagarModel = new NagarModel();

        $data = [
            'page_title' => 'Edit Basti',
            'basti' => $model->find($id),
            'nagars' => $nagarModel->findAll(),
        ];

        return view('basti/edit', $data);
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
        $model = new BastiModel();
        $data = [
            'name' => $this->request->getVar('name'),
            // Add other fields as needed
        ];
        $model->update($id, $data);

        return redirect()->to('/basti')->with('success', 'Basti updated successfully');
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
        $model = new BastiModel();
        $model->delete($id);

        return redirect()->to('/basti')->with('success', 'Basti deleted successfully');
    }}
}
