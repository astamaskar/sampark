<?php

namespace App\Controllers;

use App\Models\ContactModel;
use App\Models\MohallaModel;
use App\Models\BastiModel;
use App\Models\NagarModel;
use CodeIgniter\Controller;

class ContactController extends Controller
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
        $model = new ContactModel();
        $mohallaModel = new MohallaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();
        $contacts = $model->findAll();

        $contactx = [];
        $mohallaBastiNagar = [];
        foreach ($contacts as $contact){
            $mohallaBastiNagar['id'] = $contact['id'];
            $mohallaBastiNagar['name'] = $contact['name'];
            $mohallaBastiNagar['mobile'] = $contact['mobile'];
            $mohallaBastiNagar['email'] = $contact['email'];
            $mohallaBastiNagar['house_no'] = $contact['house_no'];
            $mohallaBastiNagar['colony'] = $contact['colony'];
            $mohallaBastiNagar['street'] = $contact['street'];
            $mohallaBastiNagar['area'] = $contact['area'];
            $mohallaBastiNagar['city'] = $contact['city'];
            $mohallaBastiNagar['state'] = $contact['state'];
            $mohallaBastiNagar['pin'] = $contact['pin'];
            $contactMohalla = $mohallaModel->where('id', $contact['mohalla_id'])->first();
            $mohallaBastiNagar['mohalla_name'] = $contactMohalla['name'];
            $mohallaBasti = $bastiModel->where('id', $contactMohalla['basti_id'])->first();
            $mohallaBastiNagar['basti_name'] = $mohallaBasti['name'];
            $mohallaBastiNagar['nagar_name'] = $nagarModel->select('name')->where('id', $mohallaBasti['nagar_id'])->first()['name'];
            array_push($contactx, $mohallaBastiNagar);
        }

        $data = [
            'page_title' => 'Contacts',
            'contactx' => $contactx,
        ];

        return view('contact/index', $data);
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
        $mohallaModel = new MohallaModel();
        $model = new ContactModel();

        $nagars = $nagarModel->findAll();
        $bastis = $bastiModel->where('nagar_id', $nagars[0]['id'])->findAll(); // Fetch basti details
        $mohallas = $mohallaModel->where('basti_id', $bastis[0]['id'])->findAll(); // Fetch mohalla details
        $data = [
            'page_title' => 'New Contact',
            'mohallas' => $mohallas,
            'bastis' => $bastis,
            'nagars' => $nagars
        ];
        return view('contact/create', $data);
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
        $model = new contactModel();
        $data = [
            'mohalla_id' => $this->request->getPost('mohalla_id'),
            'name' => $this->request->getPost('name'),
            'mobile' => $this->request->getPost('mobile'),
            'email' => $this->request->getPost('email'),
            'house_no' => $this->request->getPost('house_no'),
            'colony' => $this->request->getPost('colony'),
            'street' => $this->request->getPost('street'),
            'area' => $this->request->getPost('area'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'pin' => $this->request->getPost('pincode'),

            // Add other fields as needed
        ];
        if($model->insert($data)) {
            return redirect()->to('/contact')->with('success', 'Contact created successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured! Please try again');
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
        $contactModel = new ContactModel();
        $mohallaModel = new MohallaModel();
        $bastiModel = new BastiModel();
        $nagarModel = new NagarModel();

        $contact = $contactModel->find($id);
        $mohalla = $mohallaModel->find($contact['mohalla_id']);
        $basti = $bastiModel->find($mohalla['basti_id']);
        $nagar = $nagarModel->find($basti['nagar_id']);

        $data = [
            'page_title' => 'Edit Contact',
            'contact' => $contact,
            'thisMohalla' => $mohalla,
            'thisBasti' => $basti,
            'thisNagar' => $nagar,
            'mohallas' => $mohallaModel->findAll(),
            'bastis' => $bastiModel->findAll(),
            'nagars' => $nagarModel->findAll(),
        ];

        return view('contact/edit', $data);
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
        $model = new ContactModel();
        $data = [
            'mohalla_id' => $this->request->getPost('mohalla_id'),
            'name' => $this->request->getPost('name'),
            'mobile' => $this->request->getPost('mobile'),
            'email' => $this->request->getPost('email'),
            'house_no' => $this->request->getPost('house_no'),
            'colony' => $this->request->getPost('colony'),
            'street' => $this->request->getPost('street'),
            'area' => $this->request->getPost('area'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'pin' => $this->request->getPost('pincode'),
        ];

        if($model->update($id, $data)) {
            return redirect()->to('/contact')->with('success', 'Contact updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured! Please try again');
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
        $model = new ContactModel();
        if($model->delete($id)) {
            return redirect()->to('/contact')->with('success', 'Contact deleted successfully.');
        } else {
            return redirect()->to('/contact')->with('error', 'Error occured! Please try again');
        }
    }}


}
