<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.settings')->with('setting', Settings::first());
    }

    public function update (Request $request)
    {
        $this->validate($request, [
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]);

        $settings = Settings::first();
        $settings->update([
            'site_name' => $request->site_name,
            'contact_number' => $request->contact_number,
            'contact_email' => $request->contact_email,
            'address' => $request->address
        ]);

        toastr()->success('Blog settings updated successfully');
        return redirect()->back();
    }
}
