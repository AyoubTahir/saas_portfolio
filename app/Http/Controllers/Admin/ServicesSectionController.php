<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use App\Services\Perform;
use App\Models\ServiceField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServicesRequest;
use App\Http\Requests\ServicesFieldsRequest;

class ServicesSectionController extends Controller
{
    public function servicesSection()
    {
        $service = Perform::index(Service::class, 'servicesField');

        return view('admin.homepage.service', compact(['service']));
    }

    public function updateservicesSection(ServicesRequest $request)
    {
        Perform::update(Service::class, $request);

        return redirect()->route('home.services')->with(['success' => 'changed updated successfully']);
    }

    public function storeServices(ServicesFieldsRequest $request)
    {
        Perform::store(Service::class, ServiceField::class, $request, 'service_id');

        return redirect()->route('home.services')->with(['success' => 'changed updated successfully']);
    }

    public function editServices($id)
    {
        $servicesField = ServiceField::findorfail($id);

        return redirect()->route('home.services')->with(['success' => 'services Field has been updated.']);
    }

    public function deleteServices($id)
    {
        $servicesField = ServiceField::findorfail($id);

        $servicesField->delete();

        return redirect()->route('home.services')->with(['success' => 'services Field has been deleted.']);
    }

    public function destroyServices(Request $request)
    {
        ServiceField::destroy($request->ids);

        return redirect()->route('home.services')->with(['success' => 'services Fields has been deleted.']);
    }
}
