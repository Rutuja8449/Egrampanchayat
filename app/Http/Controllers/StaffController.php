<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function validateUser()
    {
        $user = session('user');
        // return ($user != null && $user->role == 'STAFF');
        return true;
    }

    function serviceMasterIndex()
    {
        if (!$this->validateUser())
            return redirect('/login');
        $services = Service::all();
        return view('staff.services', ['services' => $services]);
    }
    function allApplications()
    {
        $applications = Application::all();
        $services = Service::all();
        return view('staff.applications', ['services' => $services, 'applications' => $applications]);
    }

    function updateApplicationIndex(string $id)
    {
        return view('staff.update-application', ['id' => $id]);
    }
    function updateApplication(Request $request)
    {
        $application = Application::find($request->id);
        $application->status = $request->status;
        $application->remark = $application->remark != null ? $application->remark . "\n✔ " . $request->remark : "\n✔ " . $request->remark;
        if ($application->save())
            return redirect('/staff/application/all')->with('success', 'Application updated successfully.');
        else
            return redirect('/staff/application/all')->with('error', 'Something went wrong, please try again later.');

    }
}