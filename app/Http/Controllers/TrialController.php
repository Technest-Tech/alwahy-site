<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrialRequest;
use App\Models\TrialRequest as TrialRequestModel;
use Illuminate\Http\RedirectResponse;

class TrialController extends Controller
{
    public function store(TrialRequest $request): RedirectResponse
    {
        TrialRequestModel::create($request->validated());
        
        return redirect()->back()->with([
            'success' => __('messages.trial_success'),
            'form_type' => 'trial'
        ]);
    }
}

