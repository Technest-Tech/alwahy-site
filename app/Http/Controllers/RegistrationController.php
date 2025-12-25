<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Registration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function store(RegistrationRequest $request): RedirectResponse
    {
        $data = $request->validated();
        
        // Handle preferred_days array
        if (isset($data['preferred_days']) && is_array($data['preferred_days'])) {
            $data['preferred_days'] = json_encode($data['preferred_days']);
        } else {
            $data['preferred_days'] = null;
        }
        
        Registration::create($data);
        
        return redirect()->back()->with([
            'success' => __('messages.registration_success'),
            'form_type' => 'registration'
        ]);
    }
}

