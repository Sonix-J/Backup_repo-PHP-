@extends('layouts.app')

@section('title', 'Property Creation')

@section('content')
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
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest opacity-50 cursor-not-allowed">Location</div>
                <div class="p-2 border-[1px] border-housify-darkest rounded-sm text-housify-darkest opacity-50 cursor-not-allowed">Capacity</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-lg px-8">
            <div class="bg-transparent py-8 px-4 sm:px-10 max-w-[1750px] mx-auto">

                <!-- Property Type Selection -->
                <div>
                    <label class="block text-xl font-medium text-housify-darkest mb-2">Property type</label>
                    <div class="grid grid-cols-3 gap-3" id="propertyTypeGrid">
                        @foreach($types as $type)
                            <x-option-item
                                :type="$type"
                                data-value="{{ $type->type_name }}"
                            />
                        @endforeach
                    </div>
                    @error('prop_type')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Custom JS Error Message -->
                    <p id="selectionError" class="hidden mt-2 text-sm text-red-600">Please select a property type.</p>
                </div>

                <!-- Hidden Input -->
                <input type="hidden" name="prop_type" id="selectedPropType" value="">

            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-60 pb-10">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <button type="button" id="nextButton" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </button>
        </div>
    </div>

    @push('scripts')
        <style>
            .selected-option {
                @apply border-housify-darkest bg-housify-darkest text-white;
            }

            /* Style for property type options */
            [data-value] {
                @apply p-4 border rounded-md text-center cursor-pointer transition-all hover:bg-housify-lightest flex items-center gap-4;
            }
            [data-value] svg {
                @apply w-6 h-6;
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const options = document.querySelectorAll('[data-value]');
                const nextButton = document.getElementById('nextButton');
                const selectionError = document.getElementById('selectionError');
                const hiddenInput = document.getElementById('selectedPropType');

                let activeOption = null;

                // Handle option click
                options.forEach(option => {
                    option.addEventListener('click', () => {
                        const value = option.getAttribute('data-value');

                        // Deselect previously selected
                        if (activeOption && activeOption !== option) {
                            activeOption.classList.remove('selected-option');
                        }

                        // Toggle selection
                        if (activeOption === option) {
                            option.classList.remove('selected-option');
                            hiddenInput.value = '';
                            activeOption = null;
                        } else {
                            option.classList.add('selected-option');
                            hiddenInput.value = value;
                            activeOption = option;
                            selectionError.classList.add('hidden');
                        }
                    });
                });

                // Handle Next button click
                nextButton.addEventListener('click', function () {
                    const selectedType = hiddenInput.value;

                    if (!selectedType) {
                        selectionError.textContent = 'Please select a property type.';
                        selectionError.classList.remove('hidden');
                        return;
                    }

                    // ✅ Show alert when valid selection is made
                    alert("Successfully chose: " + selectedType);

                    // Navigate to next step
                    window.location.href = "{{ route('property.step2') }}";
                });
            });
        </script>
    @endpush
@endsection
