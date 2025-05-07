<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyCreationController extends Controller
{
    // Step 1: Show property type selection
    public function createProperty_step1()
    {
        $types = Type::all();
        return view('pages.identify-property', compact('types'));
    }

    // Step 1: Store selected property type
    public function storePropertyType(Request $request)
    {
        $validated = $request->validate([
            'prop_type' => 'required|string',
        ]);

        session()->put('property_data.prop_type', $validated['prop_type']);

        echo session('property_data.prop_type');

        return redirect()->route('property.step2');
    }

    // Step 2: Show location form
    public function createProperty_step2()
    {
        return view('pages.location-property');
    }

    // Step 2: Store location
    public function storeLocation(Request $request)
    {
        $validated = $request->validate([
            'prop_address' => 'required|string',
        ]);

        session()->put('property_data.prop_address', $validated['prop_address']);

        return redirect()->route('property.step3');
    }

    // Step 3: Show capacity form
    public function createProperty_step3()
    {
        return view('pages.capacity-property');
    }

    // Step 3: Store capacity
    public function storeCapacity(Request $request)
    {
        $validated = $request->validate([
            'prop_max_guest' => 'required|integer',
            'prop_room_count' => 'required|integer',
            'prop_bathroom_count' => 'required|integer',
        ]);

        session()->put('property_data.prop_max_guest', $validated['prop_max_guest']);
        session()->put('property_data.prop_room_count', $validated['prop_room_count']);
        session()->put('property_data.prop_bathroom_count', $validated['prop_bathroom_count']);

        return redirect()->route('property.step4');
    }

    // Step 4: Description
    public function createProperty_step4()
    {
        return view('pages.description-highlights');
    }

    public function storeDescription(Request $request)
    {
        $validated = $request->validate([
            'prop_title' => 'required|string|max:255',
            'prop_description' => 'required|string',
        ]);

        session()->put('property_data.prop_title', $validated['prop_title']);
        session()->put('property_data.prop_description', $validated['prop_description']);

        return redirect()->route('property.step5');
    }

    // Step 5: Amenities
    public function createProperty_step5()
    {
        $amenities = Amenity::all()->groupBy('amn_type');
        return view('pages.amenities-highlights', compact('amenities'));
    }

    public function storeAmenities(Request $request)
    {
        $request->validate([
            'amenities' => 'nullable|array',
        ]);

        session()->put('property_data.amenities', $request->input('amenities', []));

        return redirect()->route('property.step6');
    }

    // Step 6: Pictures
    public function createProperty_step6()
    {
        return view('pages.pictures-highlights');
    }

    public function storePictures(Request $request)
    {
        // Handle file upload if needed
        // For now, just store dummy data or image paths
        session()->put('property_data.images', $request->input('images', []));

        return redirect()->route('property.step7');
    }

    // Step 7: Price
    public function createProperty_step7()
    {
        return view('pages.price-highlights');
    }

    public function storePrice(Request $request)
    {
        $validated = $request->validate([
            'prop_price_per_night' => 'required|numeric|min:0',
        ]);

        session()->put('property_data.prop_price_per_night', $validated['prop_price_per_night']);

        return redirect()->route('property.review');
    }

    // Final Step: Review
    public function reviewProperty()
    {
        $data = session('property_data', []);
        return view('pages.review-property', compact('data'));
    }

    // Final Step: Save to DB
    public function saveProperty(Request $request)
    {
        $data = session('property_data', []);

        if (empty($data)) {
            return redirect()->route('property.create')->with('error', 'No data found. Please start again.');
        }

        // Add extra fields
        $data['user_id'] = auth()->id();
        $data['prop_status'] = 'pending';
        $data['prop_date_created'] = now();

        // Save to DB
        $property = Property::create($data);

        // Clear session
        session()->forget('property_data');

        return redirect()->route('home')->with('success', 'Property created successfully!');
    }
}
