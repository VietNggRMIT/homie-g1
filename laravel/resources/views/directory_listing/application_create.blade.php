@extends('layouts.app')
@section('title', 'Create Application')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="container mt-4">
        @if($listing)
            <div class="card edit-form">
                <div class="text-center mt-5">
                    <h1>Application Form</h1>
                </div>

                <div class="card-body">
                    {{-- /*****************************************************************************
                    The code below uses elements from:
                    *Title: Database: Routing
                    *Author: Laravel
                    *Code version: 9.x
                    *Availability: https://laravel.com/docs/9.x/routing (Accessed 5 November 2022)
                    *****************************************************************************/ --}}
                    {{-- Problems with clicking - fixed (2023 Jan 04) --}}
                    <button onclick="window.location.href='{{ route('listings.show', ['listing' => \App\Models\Listing::where(['id' => $listing])->pluck('listing_name')->first()]) }}';" type="button" class="btn btn-danger mb-3">Cancel</button>
                    <button onclick="window.location.href='{{ route('listings.index') }}';" type="button" class="btn btn-secondary mb-3">Back to all listings</button>

                    <form name="add-application-post-form" id="add-application-post-form" method="post" action="{{url('store-application')}}">
                        @csrf

                        {{-- Row 1 --}}
                        <div class="row g-2 mb-3 d-flex justify-content-center">
                            {{-- 0. Read Only --}}
                            <div class="col-md">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">You Are Applying To</span>
                                    <input type="text" class="form-control" disabled value="{{ \App\Models\Listing::where(['id' => $listing])->pluck('listing_name')->first() }}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">At</span>
                                    <input type="text" class="form-control" disabled value="{{
                                \App\Models\Listing::where(['id' => $listing])->pluck('listing_address_subdivision_1')->first() . ' ' .
                                \App\Models\Listing::where(['id' => $listing])->pluck('listing_address_subdivision_2')->first() . ' ' .
                                \App\Models\Listing::where(['id' => $listing])->pluck('listing_address_subdivision_3')->first()
                            }}">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Owned by</span>
                                    <input type="text" class="form-control" disabled value="{{ \App\Models\User::where(['id' => \App\Models\Listing::where(['id' => $listing])->pluck('user_id')->first()])->pluck('user_real_name')->first() }}">
                                </div>
                            </div>
                        </div>

                        {{-- Row 2 --}}
                        <div class="row g-2 mb-3">
                            {{-- 1. Name --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="applicant" name="applicant" required placeholder="Linus Torvalds">
                                    <label for="applicant">Name</label>
                                </div>
                            </div>
                            {{-- 2. Phone Number --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="phone" name="phone" required placeholder="0982354123">
                                    <label for="phone">Phone Number</label>
                                </div>
                            </div>

                            {{-- 3. Email Address --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="name@gmail.com">
                                    <label for="email">Email Address</label>
                                </div>
                            </div>

                            {{-- 4. Date of Birth (dd/mm/yyyy) --}}
                            {{-- !IMPORTANT: type is "date" instead of "text" --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" required placeholder="????">
                                    <label for="dateofbirth">Date of Birth (dd/mm/yyyy)</label>
                                </div>
                            </div>
                        </div>

                        <hr class="border border-secondary border-0 opacity-00 my-3">

                        {{-- Row 3 --}}
                        <div class="row g-2 mb-3">

                            {{-- 5. Occupancy Duration (days, months, years) --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="occupancy" name="occupancy" required placeholder="6 days">
                                    <label for="occupancy">Occupancy Duration (days, months, years)</label>
                                </div>
                            </div>

                            {{-- 6. Move in Date (dd/mm/yyyy) --}}
                            {{-- !IMPORTANT: type is "date" instead of "text" --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="movein" name="movein" required placeholder="????">
                                    <label for="movein">Move in Date (dd/mm/yyyy)</label>
                                </div>
                            </div>

                            {{-- 7. Rent Payment Method --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="payment" name="payment" required placeholder="credit card">
                                    <label for="payment">Rent Payment Method (e.g. cash, credit card)</label>
                                </div>
                            </div>

                            <div class="col-md">
                                {{-- 8. Car? --}}
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="vehicle" name="vehicle">
                                    <label class="form-check-label" for="vehicle">Own a vehicle?</label>
                                </div>
{{--                                <label>Do you have a vehicle?</label>--}}
{{--                                <input type="radio" id="y_vehicle" name="vehicle" required value="Yes">--}}
{{--                                <label for="y_vehicle">Yes</label>--}}
{{--                                <input type="radio" id="n_vehicle" name="vehicle" required value="No">--}}
{{--                                <label for="n_vehicle">No</label><br>--}}
                                {{-- 9. Pet? --}}
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="pet" name="pet">
                                    <label class="form-check-label" for="pet">Have pets?</label>
                                </div>
{{--                                <label>Do you have pets?</label>--}}
{{--                                <input type="radio" id="y_pet" name="pet" required="true" value="Yes">--}}
{{--                                <label for="y_pet">Yes</label>--}}
{{--                                <input type="radio" id="n_pet" name="pet" required="true" value="No">--}}
{{--                                <label for="n_pet">No</label><br>--}}
                            </div>
                        </div>

                        <hr class="border border-secondary border-0 opacity-00 my-3">

                        {{-- Row 4 --}}
                        <div class="row g-2 mb-3">
                            {{-- 10. Job --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="job" name="job" required placeholder="Software at Microsoft">
                                    <label for="job">Company and Job Title</label>
                                </div>
                            </div>
                            {{-- 11. Income --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="income" name="income" required placeholder="90 000 000">
                                    <label for="income">Annual Income (VND)</label>
                                </div>
                            </div>
                            {{-- 12. Address --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="address" name="address" required placeholder="credit card">
                                    <label for="address">Current Address</label>
                                </div>
                            </div>
                            {{-- 13. Leaving Reason --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="reason" name="reason" required placeholder="credit card">
                                    <label for="reason">Leaving Reason</label>
                                </div>
                            </div>
                            {{-- 14. Previous Landlord Info --}}
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="landlord" name="landlord" required placeholder="credit card">
                                    <label for="landlord">Previous Landlord Info</label>
                                </div>
                            </div>

                            <div class="col-md">
                                {{-- 15. Evited? --}}
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="evicted" name="evicted">
                                    <label class="form-check-label" for="evicted">Have you ever been evicted before?</label>
                                </div>
{{--                                <label for="evicted">Have you ever been evicted before?</label>--}}
{{--                                <input type="radio" id="y_evicted" name="evicted" required="true" value="Yes">--}}
{{--                                <label for="y_evicted">Yes</label>--}}
{{--                                <input type="radio" id="n_evicted" name="evicted" required="true" value="No">--}}
{{--                                <label for="n_evicted">No</label><br>--}}
                                {{-- 16. Crime & felony? --}}
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="convicted" name="convicted">
                                    <label class="form-check-label" for="convicted">Have you ever been convicted of a crime or felony?</label>
                                </div>
{{--                                <label>Have you ever been convicted of a crime or felony?</label>--}}
{{--                                <input type="radio" id="y_convicted" name="convicted" required="true" value="Yes">--}}
{{--                                <label for="y_convicted">Yes</label>--}}
{{--                                <input type="radio" id="n_convicted" name="convicted" required="true" value="No">--}}
{{--                                <label for="n_convicted">No</label><br>--}}
                            </div>

                        </div>

                        {{-- 17. Associated Listing ID (Hidden) --}}
                        <div class="form-group">
                            {{-- <label for="listing_id">Associated Listing ID</label> --}}
                            <input type="number" name="listing_id" hidden value="{{ $listing }}">
                        </div>

                        {{-- 18. Final --}}
                        <div class="text-center mb-3">
                            <button type="submit" class="custom-btn btn-1 purple-ice">Submit</button>
                        </div>

                    </form> {{-- end form --}}
                </div>
            </div>
        @endif
    </div>
@endsection
