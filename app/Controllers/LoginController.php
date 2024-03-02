<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class LoginController extends Controller
{
    public function index()
    {

        // Load the login view
        return view('login/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check if username and password match the fixed credentials
        if ($username === '9826926200' && $password === 'mypass') {
            // Set session data to indicate that the user is logged in
            $session = session();
            $session->set('isLoggedIn', true);

            // Redirect to a protected page
            return redirect()->to('/karyakarta');
        } else {
            // Invalid credentials, redirect back to login page with error message
            return redirect()->to('/login')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        // Destroy all session data
        session()->destroy();

        // Redirect to the login page
        return redirect()->to('/login');
    }
}
