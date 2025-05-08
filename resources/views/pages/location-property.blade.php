{{-- resources/views/properties/step1-address.blade.php --}}
@extends('layouts.app')

@section('content')
    <div></div>

    <!-- Main Content -->
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
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest">Capacity</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-md px-8">
            <!-- Address Section -->
            <div class="bg-transparent py-8 px-4 sm:px-10 max-w-[1750px] mx-auto">
                <h2 class="block text-xl font-medium text-housify-darkest mb-2">Add the address of the property</h2>

                <form id="addressForm">
                    <div class="flex-col">
                        <!-- Sweet Address -->
                        <div class="mt-4">
                            <label for="street_address" class="block text-md font-medium text-gray-700">Street Address</label>
                            <input type="text" name="street_address" id="street_address" autocomplete="street-address"
                                   class="mb-2 block w-full border border-housify-darkest bg-housify-lightest rounded-sm shadow-sm py-2 px-3 text-md">
                        </div>

                        <!-- City/Municipality -->
                        <div class="my-4">
                            <label for="city" class="block text-md font-medium text-gray-700">City/Municipality</label>
                            <input type="text" name="city" id="city" autocomplete="address-level2"
                                   class="mb-2 block w-full border border-housify-darkest bg-housify-lightest rounded-sm shadow-sm py-2 px-3 text-md">
                        </div>

                        <!-- Province -->
                        <div class="my-2">
                            <label for="province" class="block text-mt font-medium text-gray-700">Province</label>
                            <input type="text" name="province" id="province" autocomplete="address-level1"
                                   class="mb-2 block w-full border border-housify-darkest bg-housify-lightest rounded-sm shadow-sm py-2 px-3 text-md">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-40">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.step3') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>

@endsection
