{{-- resources/views/properties/step2-highlights.blade.php --}}
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
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest">Amenities</div>
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest">Pictures</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-md px-8">
            <!-- Highlights Form -->
            <form id="highlightsForm" class="px-6 py-8">
                @csrf

                <!-- Title Section -->
                <div class="mb-6">
                    <label class="block text-xl font-medium text-gray-700 mb-1">Add title to your property</label>
                    <div class="mt-1">
                        <input type="text" id="property_title" name="property_title"
                               class="w-full px-3 py-2 border border-housify-darkest bg-housify-lightest   rounded-sm shadow-sm focus:outline-none text-md"
                               placeholder="Beautiful beachfront villa with pool">
                    </div>
                </div>

                <!-- Description Section -->
                <div class="mb-6">
                    <label class="block text-xl font-medium text-gray-700 mb-1">Add brief description</label>
                    <div class="mt-1">
                        <textarea id="property_description" name="property_description" rows="4"
                                  class="w-full px-3 py-2 border border-housify-darkest bg-housify-lightest rounded-sm shadow-sm focus:outline-none text-md"
                                  placeholder="Describe what makes your property special..."></textarea>
                    </div>
                </div>
            </form>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-40">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.step5') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>
@endsection
