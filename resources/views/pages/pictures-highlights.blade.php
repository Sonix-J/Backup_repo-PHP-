{{-- resources/views/properties/step4-photos.blade.php --}}
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
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Pictures</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-md px-8 py-2">
            <!-- Photo Upload Section -->
            <div class="px-6 py-2 border-b ">
                <h3 class="text-xl font-medium text-gray-900 mb-2">Add some photos of your house</h3>

                <!-- Photo Upload Area -->
                <div class="border-2 border-dashed border-housify-dark rounded-sm px-6 py-4 text-center mb-4 min-h-72">
                    <!-- Photo Thumbnails -->
                    <div id="photo-thumbnails" class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <!-- Thumbnails will appear here -->
                    </div>

                    <svg class="mt-2 mx-auto h-12 w-12 text-housify-darkest" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <div class="mt-2 text-sm text-gray-600">
                        <label for="file-upload" class="relative cursor-pointer rounded-md font-medium text-dark-red     hover:text-indigo-500 focus-within:outline-none">
                            <span>Upload photos</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only" multiple accept="image/*">
                        </label>
                        <p class="text-xs text-housify-darkest mt-1">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-24">
            <a href="#" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.step7') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>

<script>
    // Store uploaded photos
    let uploadedPhotos = [];

    // Handle file upload
    document.getElementById('file-upload').addEventListener('change', function(e) {
        const files = e.target.files;
        const thumbnailsContainer = document.getElementById('photo-thumbnails');

        // Clear existing thumbnails
        thumbnailsContainer.innerHTML = '';
        uploadedPhotos = [];

        // Process each file
        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            // Validate file type
            if (!file.type.match('image.*')) {
                continue;
            }

            // Add to uploaded photos array
            uploadedPhotos.push(file);

            // Create thumbnail preview
            const reader = new FileReader();
            reader.onload = function(event) {
                const thumbnail = document.createElement('div');
                thumbnail.className = 'relative group';
                thumbnail.innerHTML = `
                    <img src="${event.target.result}" class="w-full h-32 object-cover rounded-sm border-housify-darkest border">
                    <button type="button" onclick="removePhoto(${i})" class="absolute top-1 right-1 bg-white rounded-full p-1 opacity-0 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;
                thumbnailsContainer.appendChild(thumbnail);
            };
            reader.readAsDataURL(file);
        }
    });

    // Remove photo
    function removePhoto(index) {
        uploadedPhotos.splice(index, 1);
        renderThumbnails();
    }

    // Render all thumbnails
    function renderThumbnails() {
        const thumbnailsContainer = document.getElementById('photo-thumbnails');
        thumbnailsContainer.innerHTML = '';

        uploadedPhotos.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(event) {
                const thumbnail = document.createElement('div');
                thumbnail.className = 'relative group';
                thumbnail.innerHTML = `
                    <img src="${event.target.result}" class="w-full h-32 object-cover rounded-sm border-housify-darkest border">
                    <button type="button" onclick="removePhoto(${index})" class="absolute top-1 right-1 bg-white rounded-full p-1 opacity-0 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                `;
                thumbnailsContainer.appendChild(thumbnail);
            };
            reader.readAsDataURL(file);
        });
    }
</script>

<style>
    #photo-thumbnails img {
        transition: transform 0.2s;
    }
    #photo-thumbnails img:hover {
        transform: scale(1.02);
    }
</style>
@endsection
