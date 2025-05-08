@extends('layouts.app')

@section('content')
    <div class="relative w-full h-full mt-28 mb-10 bg-housify-lightest gap-2">
        <div class="px-[8%]">
            <div>
                <h2 class="text-left text-3xl font-extrabold text-gray-900">
                    Step 2: Add highlights
                </h2>
            </div>

            <div class="flex justify-start gap-2 pt-5">
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Description</div>
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Amenities</div>
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest">Pictures</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-md px-8 py-2">
            <!-- Amenities Sections -->
            <div class="p-6 space-y-8">

                <!-- Basic Amenities (BA) -->
                <div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Identify basic amenities</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($amenities->get('BA', []) as $amenity)
                            <x-option-item
                                :type="[
                                'icon_name' => $amenity->amn_icon,
                                'type_name' => $amenity->amn_name
                            ]"
                            />
                        @endforeach
                    </div>
                </div>

                <!-- Standout Amenities (SA) -->
                <div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Identify standout amenities</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($amenities->get('SA', []) as $amenity)
                            <x-option-item
                                :type="[
                                'icon_name' => $amenity->amn_icon,
                                'type_name' => $amenity->amn_name
                            ]"
                            />
                        @endforeach
                    </div>
                </div>

                <!-- Safety Items (SI) -->
                <div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Identify safety items</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($amenities->get('SI', []) as $amenity)
                            <x-option-item
                                :type="[
                                'icon_name' => $amenity->amn_icon,
                                'type_name' => $amenity->amn_name
                            ]"
                            />
                        @endforeach
                    </div>
                </div>

                <!-- Other Amenities -->
                <div>
                    <h3 class="text-xl font-medium text-gray-900 mb-4">Other amenities</h3>
                    <div class="flex items-center space-x-2 mb-3">
                        <input type="text" id="custom_amenity"
                               class="flex-1 px-3 py-2 border border-housify-darkest rounded-sm shadow-sm text-md bg-housify-lightest "
                               placeholder="Enter custom amenity">
                        <button type="button" onclick="addCustomAmenity()"
                                class="px-4 py-2 border border-housify-darkest text-md font-medium rounded-sm shadow-sm text-housify-lightest bg-housify-darkest hover:bg-housify-dark">
                            Add
                        </button>
                    </div>
                    <div id="custom_amenities_list" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- Dynamic custom amenities will be added here -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-32">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.step6') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>

    <script>
        function addCustomAmenity() {
            const input = document.getElementById('custom_amenity');
            const value = input.value.trim();

            if (value) {
                const id = 'custom_' + value.toLowerCase().replace(/[^a-z0-9]+/g, '_');

                const amenityItem = document.createElement('div');
                amenityItem.className = 'amenity-item';
                amenityItem.dataset.amenity = id;
                amenityItem.innerHTML = `
                <input type="checkbox" id="${id}" class="hidden peer" checked>
                <label for="${id}"
                       class="block px-4 py-2 border rounded-md text-sm font-medium text-center cursor-pointer peer-checked:bg-green-100 peer-checked:border-green-300 peer-checked:text-green-800 hover:bg-gray-50">
                    ${value}
                </label>
            `;

                document.getElementById('custom_amenities_list').appendChild(amenityItem);
                input.value = '';
            }
        }
    </script>
@endsection
