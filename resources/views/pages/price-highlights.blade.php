@extends('layouts.app')

@section('content')
    <div class="relative w-full h-full mt-28 mb-10 bg-housify-lightest gap-2">
        <div class="px-[8%]">
            <div>
                <h2 class="text-left text-3xl font-extrabold text-gray-900">
                    Step 3: Set your price
                </h2>
            </div>

            <div class="flex justify-start gap-2 pt-5">
                <div class="p-2 border-[1px] border-housify-darkest bg-housify-darkest rounded-sm text-housify-light">Price</div>
            </div>
        </div>

        <div class="m-auto w-full max-w-screen-sm px-8">
            <div class="px-6 py-6">
                <p class="text-xl text-housify-darkest mb-2 ml-24">Set price for the property</p>

                <form id="priceForm" action="#" method="POST">
                    @csrf

                    <div class="flex-col bg-housify-lightest justify-items-center">
                        <div class="py-1 px-1 flex align-bottom items-end">
                            <span class="text-housify-darkest text-[2rem] align-bottom pb-2">₱</span>
                            <input type="number" name="price" id="price"
                                   value="{{ old('price', session('property.price', 1780)) }}"
                                   class="text-[5rem] max-w-[300px] h-20 align-bottom font-semibold text-center bg-housify-lightest appearance-none [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none focus:outline-none"
                                   min="1"
                                   step="1">
                        </div>
                        <span class="text-housify-dark text-md">rate per night</span>
                    </div>
                </form>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div class="relative flex justify-between px-[8%] pt-[300px]">
            <a href="{{ url()->previous() }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border-[1px] border-housify-darkest shadow-sm text-lg font-medium rounded-sm text-housify-darkest bg-housify-light hover:bg-housify-lightest focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-lightest">
                Back
            </a>
            <a href="{{ route('property.review') }}" class="min-w-[150px] inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-sm text-housify-light bg-housify-darkest hover:bg-housify-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-housify-dark">
                Next
            </a>
        </div>
    </div>
@endsection
