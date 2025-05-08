{{-- resources/views/properties/step1-capacity.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="relative w-full h-full mt-28 mb-10 bg-housify-lightest gap-2">
        <div class="px-[8%]">
            <div>
                <h2 class="text-left text-3xl font-extrabold text-gray-900">
                    Step 1: Identify your property
                </h2>
            </div>

            <div class="flex justify-start gap-2 pt-5">
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Property Type</div>
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Location</div>
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Capacity</div>
            </div>
        </div>


        <div class="m-auto w-full max-w-screen-sm px-8">
            <!-- Capacity Configuration -->
            <div class="px-6 py-8 border-b border-gray-200">
                <h3 class="text-xl font-medium text-gray-900 mb-4">Configure property capacity</h3>

                <!-- Backrooms Counter -->
                <div class="flex items-center justify-between py-3">
                    <div>
                        <h4 class="text-md font-medium text-gray-700">Backrooms</h4>
                    </div>
                    <div class="flex items-center">
                        <button type="button" onclick="decrement('backrooms')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span id="backrooms" class="mx-4 text-lg font-medium w-8 text-center">0</span>
                        <button type="button" onclick="increment('backrooms')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Guests Counter -->
                <div class="flex items-center justify-between py-3 border-t border-gray-200">
                    <div>
                        <h4 class="text-md font-medium text-gray-700">Guests</h4>
                    </div>
                    <div class="flex items-center">
                        <button type="button" onclick="decrement('guests')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span id="guests" class="mx-4 text-lg font-medium w-8 text-center">0</span>
                        <button type="button" onclick="increment('guests')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Bathrooms Counter -->
                <div class="flex items-center justify-between py-3 border-t border-gray-200">
                    <div>
                        <h4 class="text-md font-medium text-gray-700">Bathrooms</h4>
                    </div>
                    <div class="flex items-center">
                        <button type="button" onclick="decrement('bathrooms')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <span id="bathrooms" class="mx-4 text-lg font-medium w-8 text-center">0</span>
                        <button type="button" onclick="increment('bathrooms')" class="counter-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-[232px]">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.step4') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>

<script>
    // Initialize counters
    const counters = {
        backrooms: 0,
        guests: 0,
        bathrooms: 0
    };

    // Update counter display
    function updateCounter(id) {
        document.getElementById(id).textContent = counters[id];
    }

    // Increment counter
    function increment(id) {
        counters[id]++;
        updateCounter(id);
    }

    // Decrement counter (minimum 0)
    function decrement(id) {
        if (counters[id] > 0) {
            counters[id]--;
            updateCounter(id);
        }
    }
</script>

@endsection
