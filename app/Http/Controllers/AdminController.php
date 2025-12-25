<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\TrialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private const ADMIN_EMAIL = 'admin@alwahy.com';
    private const ADMIN_PASSWORD = 'admin123';

    public function showLogin()
    {
        if (Session::has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($request->email === self::ADMIN_EMAIL && $request->password === self::ADMIN_PASSWORD) {
            Session::put('admin_logged_in', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Session::forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        if (!Session::has('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $registrations = Registration::with('package')->orderBy('created_at', 'desc')->get();
        $trialRequests = TrialRequest::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('registrations', 'trialRequests'));
    }
}

