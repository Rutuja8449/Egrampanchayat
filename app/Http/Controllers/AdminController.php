<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Service;
use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $user = [];
    function validateUser()
    {
        $user = session('user');
        // return ($user != null && $user->role == 'ADMIN');
        return true;
    }
    function dashboardIndex()
    {
        if (!$this->validateUser())
            return redirect('/login');
        return view('admin.dashboard');
    }

    function serviceMasterIndex()
    {
        if (!$this->validateUser())
            return redirect('/login');
        $services = Service::all();
        // return $services;
        return view('admin.services', ['services' => $services]);
    }
    function serviceUpdateIndex(string $id)
    {
        if (!$this->validateUser())
            return redirect('/login');
        $service = Service::find($id);
        // return $service;
        return view('admin.update-service', ['service' => $service]);
    }
    function createService(Request $r)
    {
        if (!$this->validateUser())
            return redirect('/login');
        $service = new Service;
        $service->title = $r->title;
        $service->description = $r->description;
        $service->certificate_form = $r->textEditor;

        if ($service->save())
            return back()->with('success', 'Service created successfully.');
        else
            return back()->with('error', 'Something went wrong, please try again later.');
        // return view('admin.services');
    }
    function deleteService(string $id)
    {
        if (!$this->validateUser())
            return redirect('/login');
        $service = Service::find($id);
        $service->delete();
        return back()->with('success', 'Service deleted successfully.');

    }
    function updateService(Request $r)
    {
        if (!$this->validateUser())
            return redirect('/login');
        $service = Service::find($r->id);
        $service->title = $r->title;
        $service->description = $r->description;
        if ($service->save())
            return redirect('/admin/services')->with('success', 'Service updated successfully.');
        else
            return redirect('/admin/services')->with('error', 'Something went wrong, please try again later.');
    }

    function allApplications()
    {
        $applications = Application::all();
        $services = Service::all();
        $users = User::all();
        return view(
            'admin.applications',
            ['services' => $services, 'applications' => $applications, 'users' => $users]
        );
    }

    function updateApplicationIndex(string $id)
    {
        return view('admin.update-application', ['id' => $id]);
    }
    function updateApplication(Request $request)
    {
        $application = Application::find($request->id);
        $application->status = $request->status;
        $application->remark = $application->remark != null ? $application->remark . "\n✔ " . $request->remark : "\n✔ " . $request->remark;
        if ($application->save())
            return redirect('/admin/application/all')->with('success', 'Application updated successfully.');
        else
            return redirect('/admin/application/all')->with('error', 'Something went wrong, please try again later.');

    }
}