<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceImage;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome()
    {
        $services = Service::with([
            'serviceImages' => function ($query) {
                $query->inRandomOrder()->take(3);
            }
        ])->get();

        $randomServiceImages = ServiceImage::inRandomOrder()->take(3)->get();
        $serviceImagesWithIdentifiers = [];

        foreach ($randomServiceImages as $index => $serviceImage) {
            $serviceImagesWithIdentifiers[] = [
                'identifier' => $index + 1, // Assign identifiers 1, 2, 3
                'id' => $serviceImage->id,
                'service_id' => $serviceImage->service_id,
                'image' => $serviceImage->image,
            ];
        }
        return view("welcome", ["services" => $services, "serviceImagesWithIdentifiers" => $serviceImagesWithIdentifiers]);
    }
}
