<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Service;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function validateUser()
    {
        $user = session('user');
        // return ($user != null && $user->role == 'USER');
        return true;
    }
    function getUser()
    {
        return session('user');
    }

    function serviceMasterIndex()
    {
        if (!$this->validateUser())
            return redirect('/login');
        $services = Service::all();
        return view('user.services', ['services' => $services]);
    }

    function applyService(string $id)
    {
        $user_id = $this->getUser()->id;
        if (Application::where('user_id', $user_id)->where('service_id', $id)->first() != null) {
            return back()->with('warning', 'Already applied for this service.');
        }
        $app = new Application;
        $app->user_id = $user_id;
        $app->service_id = $id;
        if ($app->save())
            return back()->with('success', 'Application created successfully.');
        else
            return back()->with('error', 'Something went wrong, please try again later.');

    }

    function myApplications()
    {
        $user_id = $this->getUser()->id;
        $applications = Application::where('user_id', $user_id)->get();
        $services = Service::all();
        return view('user.application', ['services' => $services, 'applications' => $applications]);
    }

    function profile()
    {
        return view('common.profile', ['user' => $this->getUser()]);
    }

    function viewCertificate(string $id)
    {
        $application = Application::find($id);
        $user = $this->getUser();
        $service = Service::find($application->service_id);
        $data = str_replace('${name}', $user->name, $service->certificate_form);
        return view('user.view-certificate', ['formdata' => $data, 'token' => $application->tracking_id]);
    }
}