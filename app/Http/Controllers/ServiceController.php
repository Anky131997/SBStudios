<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function createServiceImage(){
        $services = Service::all();
        return view("services.serviceimage", ["services" => $services]);
    }
    
    public function storeServiceImage(Request $request){
        
        $path = $request->file('image')->store('serviceImages');
        // $path = Storage::disk('local')->put('serviceImages', $request->file('image'));
        $filenameArray = explode('/', $path);
        $filename = $filenameArray[1];

        ServiceImage::create([
            'service_id' => $request->service,
            'image' => $filename,
        ]);

        return redirect()->back()->with('success','');
    }

    public function showServiceImage(){
        $serviceImages = ServiceImage::all();
        return view("services.showimage", ["serviceImages" => $serviceImages]);
    }
}
