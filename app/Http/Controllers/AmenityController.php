<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{
    public function getAllAmenities()
    {
        return [
            [
                'type_name' => 'Pool',
                'icon_name' => 'pool',
                'amn_type' => 'BA'
            ],
            [
                'type_name' => 'Gym',
                'icon_name' => 'dumbbell',
                'amn_type' => 'BA'
            ],
            [
                'type_name' => 'Beach Area',
                'icon_name' => 'umbrella-beach',
                'amn_type' => 'BA'
            ],
            [
                'type_name' => 'Shower',
                'icon_name' => 'shower',
                'amn_type' => 'BA'
            ],
            [
                'type_name' => 'Outdoor Dining',
                'icon_name' => 'utensils',
                'amn_type' => 'SI'
            ],
            [
                'type_name' => 'Line Access',
                'icon_name' => 'wifi',
                'amn_type' => 'BA'
            ],
            [
                'type_name' => 'Billards',
                'icon_name' => 'billiards',
                'amn_type' => 'SI'
            ],
            [
                'type_name' => 'BBC Call',
                'icon_name' => 'phone',
                'amn_type' => 'SA'
            ],
            [
                'type_name' => 'Pails',
                'icon_name' => 'bucket',
                'amn_type' => 'SA'
            ]
        ];
    }
//    public function getAllAmenities(){
//        $amenities = Amenity::all();
//        return response()->json(["message" => "Successfully fetched data","data" => $amenities], 200);
//    }
    public function getAmenityById($id)
    {
        $amenity = Amenity::find($id);
        if($amenity){
            return response()->json(["message" => "Successfully fetched data","data" => $amenity], 200);
        }
        return response()->json(["message" => "ID doesnt exist"], 404);
    }
}
