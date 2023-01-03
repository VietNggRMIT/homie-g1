@extends('layouts.app')
@section('title', 'Create/Edit Listing')

@if(isset($listing))
    <title>Edit Listing</title>
@else
    <title>Create Listing</title>
@endif

<meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">--}}

@section('content')

    <div class="container my-4">

        <div class="card edit-form p-3">
{{--            <div class="card-header text-center font-weight-bold">Add Or Edit Listing Form</div>--}}
            <div class="card-body form-bg p-5">

                {{-- 0. Form Title --}}
                @if(isset($listing))
                    <div class="text-center"><h1>Update Listing</h1></div>
                @else
                    <div class="text-center"><h1>Create Listing</h1></div>
                @endif
                <button onclick="window.location.href='{{ route('listings.show', ['listing' => $listing]) }}';" type="button" class="btn btn-danger mb-3">Cancel</button>
                <button onclick="window.location.href='{{ route('listings.index') }}';" type="button" class="btn btn-secondary mb-3">Back to all listings</button>

                {{-- 0. Form Begins --}}
                <form name="add-listing-post-form" id="add-listing-post-form" method="post" enctype="multipart/form-data"
                    @if(isset($listing))
                        action="{{ url("update-listing/{$listing->id}") }}">
                    @else
                        action="{{ url('store-listing') }}">
                    @endif

                    {{-- 0. Form Inside --}}
                    @csrf

                    {{-- 0. User --}}
                    <div class="input-group mb-3">
                        <span class="input-group-text">You Are</span>
                        @if(isset($listing))
                            <input type="text" class="form-control" disabled value="{{ \App\Models\User::where(['id' => $listing->user_id])->pluck('user_real_name')->first() }}">
                        @else
                            <input type="text" class="form-control" disabled value="{{ \App\Models\User::where(['id' => $user])->pluck('user_real_name')->first() }}">
                        @endif
                    </div>

                    {{-- 1. Listing Name --}}
                    <div class="input-group mb-3">
                        <span class="input-group-text">Listing Name</span>
                        @if (isset($listing))
                            <input type="text" name="listing_name" class="form-control" placeholder="A house with two bedrooms" required value="{{ $listing->listing_name }}">
                        @else
                            <input type="text" name="listing_name" class="form-control" placeholder="A house with two bedrooms" required>
                        @endif
                    </div>

                    {{-- 2 Listing Description --}}
                    <div class="form-floating mb-3">

                        @if (isset($listing))
                            <textarea class="form-control" placeholder="Very nice house with 2 windows and a yard" name="listing_description" style="height: 150px">{{ $listing->listing_description }}</textarea>
                        @else
                            <textarea class="form-control" placeholder="Very nice house with 2 windows and a yard" name="listing_description" style="height: 100px"></textarea>
                        @endif
                        <label for="listing_description">Description</label>
                    </div>

                    {{-- 3, 4, 5 --}}
                    <div class="row g-2 mb-3">
                        {{-- 3 Listing Address Subdivision 1 (Provincial Level) --}}
                        @php
                            $provinces = ['Ha Noi','Ha Giang','Cao Bang','Bac Kan','Tuyen Quang','Lao Cai','Dien Bien','Lai Chau','Son La','Yen Bai','Hoa Binh','Thai Nguyen','Lang Son','Quang Ninh','Bac Giang','Phu Tho','Vinh Phuc','Bac Ninh','Hai Duong','Hai Phong','Hung Yen','Thai Binh','Ha Nam','Nam Dinh','Ninh Binh','Thanh Hoa','Nghe An','Ha Tinh','Quang Binh','Quang Tri','Thua Thien Hue','Da Nang','Quang Nam','Quang Ngai','Binh Dinh','Phu Yen','Khanh Hoa','Ninh Thuan','Binh Thuan','Kon Tum','Gia Lai','Dak Lak','Dak Nong','Lam Dong','Binh Phuoc','Tay Ninh','Binh Duong','Dong Nai','Ba Ria - Vung Tau','Ho Chi Minh','Long An','Tien Giang','Ben Tre','Tra Vinh','Vinh Long','Dong Thap','An Giang','Kien Giang','Can Tho','Hau Giang','Soc Trang','Bac Lieu','Ca Mau'];
                        @endphp

                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelectGrid1" name="listing_address_subdivision_1">

                                    @if (isset($listing))
                                        <option value="{{ $listing->listing_address_subdivision_1 }}" selected>{{ $listing->listing_address_subdivision_1 }}</option>
                                    @endif

                                    @foreach ($provinces as $province)
                                        <option value="{{ $province }}"> {{ $province }}</option>
                                    @endforeach

                                </select>
                                <label for="floatingSelectGrid1">Listing Address Subdivision 1 (Provincial Level)</label>
                            </div>
                        </div>
                        {{-- 4 Listing Address Subdivision 2 (District Level) --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid2" placeholder="Ba Dinh District" name="listing_address_subdivision_2"
                                       @if (isset($listing))
                                           value="{{ $listing->listing_address_subdivision_2}}">
                                @else
                                    value="">
                                @endif
                                <label for="floatingInputGrid2">Listing Address Subdivision 2 (District Level)</label>
                            </div>
                        </div>
                        {{-- 5 Listing Address Subdivision 3 (Commune Level) --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInputGrid3" placeholder="Long Thanh Ward" name="listing_address_subdivision_3"
                                       @if (isset($listing))
                                           value="{{ $listing->listing_address_subdivision_3 }}">
                                @else
                                    value="">
                                @endif
                                <label for="floatingInputGrid3">Listing Address Subdivision 3 (Commune Level)</label>
                            </div>
                        </div>
                    </div>

                    {{-- 6 Listing Address Coordinate --}}
                    <div class="form-group">
                        @if (isset($listing))
                            <div style="display: none">{{ $x = $listing->listing_address_latitude }}</div>
                            <div style="display: none">{{ $y = $listing->listing_address_longitude }}</div>
                        @else
                            <div style="display: none">{{ $x = 21.029697892035657 }}</div>
                            <div style="display: none">{{ $y = 105.81145785151868 }}</div>
                        @endif
                        <div class="row g-2 mb-3">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input name="listing_address_latitude" type="number" class="form-control" id="floatingInputGrid4" placeholder="name@example.com" value="{{ $x }}">
                                    <label for="floatingInputGrid4">Listing Address Latitude</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input name="listing_address_longitude" type="number" class="form-control" id="floatingInputGrid5" placeholder="name@example.com" value="{{ $y }}">
                                    <label for="floatingInputGrid5">Listing Address Longitude</label>
                                </div>
                            </div>
                        </div>
                        <iframe
                            width="100%"
                            height="400"
                            style="border:0"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://maps.google.com/maps?q={{ $x.",".$y }}&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed">
                        </iframe>
                    </div>

                    {{-- 7 Listing Price (Vietnamese Dong) --}}
                    <div class="row g-2 my-3 d-flex justify-content-center">
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-text">Listing Price</span>
                                <input type="text"
                                    {{-- step="1000" min="0" max="990000000" --}}
                                    name="listing_price"
                                    class="form-control"
                                    placeholder="3,450,000"
                                    required
                                    @if (isset($listing))
                                        value="{{ number_format((int) $listing->listing_price) }}">
                                    @else
                                        value="">
                                    @endif
                                <span class="input-group-text">(VND)</span>
                            </div>
                        </div>
                    </div>

                    {{-- 8, 9, 10, 12 --}}
                    <div class="row g-2 mb-3 d-flex align-items-center">

                        {{-- 8 Listing Specifications: Bathroom --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input name="listing_specification_bathroom" type="number" min="0" class="form-control" placeholder="3"
                                @if (isset($listing))
                                    value="{{ $listing->listing_specification_bathroom }}">
                                @else
                                    value=""
                                @endif
                                <label for="listing_specification_bathroom">Bathroom</label>
                            </div>
                        </div>

                        {{-- 9 Listing Specifications: Bedroom --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input name="listing_specification_bedroom" type="number" min="0" class="form-control" placeholder="3"
                                @if (isset($listing))
                                    value="{{ $listing->listing_specification_bedroom }}">
                                @else
                                    value=""
                                @endif
                                <label for="listing_specification_bedroom">Bedroom</label>
                            </div>
                        </div>

                        {{-- 10 Listing Specifications: Size --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input name="listing_specification_size" type="number" min="0" class="form-control" placeholder="3"
                                @if (isset($listing))
                                    value="{{ $listing->listing_specification_size }}">
                                @else
                                    value=""
                                @endif
                                <label for="listing_specification_bedroom">Size (m<sup>2</sup>)</label>
                            </div>
                        </div>

                        {{-- 12 Listing Specifications: Maximum Tenants --}}
                        <div class="col-md">
                            <div class="form-floating">
                                <input name="listing_specification_tenant" type="number" min="0" class="form-control" placeholder="3"
                                @if (isset($listing))
                                    value="{{ $listing->listing_specification_tenant }}">
                                @else
                                    value=""
                                @endif
                                <label for="listing_specification_bedroom">Maximum Tenants</label>
                            </div>
                        </div>

                        {{-- 13 Listing Available --}}
                        <div class="col-md">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="listing_specification_owner"

                                @if (isset($listing))
                                    @if ($listing->listing_specification_owner == 1)
                                        checked>
                                    @endif
                                @else
                                    checked>
                                @endif

                                <label class="form-check-label" for="listing_available">Living with Owner</label>
                            </div>
                        </div>

                        {{-- 14 Listing Available --}}
                        <div class="col-md">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" name="listing_available"

                                @if (isset($listing))
                                    @if ($listing->listing_available == 1)
                                        checked>
                                    @endif
                                @else
                                    checked>
                                @endif

                                <label class="form-check-label" for="listing_available">Listing Available</label>
                            </div>
                        </div>
                    </div>

                    {{-- 15 listingimages --}}
                    <div class="row mb-3">
{{--                        <div class="d-flex justify-content-center align-items-center">--}}
{{--                            <label for="listing_images">Upload images</label>--}}
{{--                            <input type="file"--}}
{{--                                   name="listing_images[]"--}}
{{--                                   multiple="multiple"--}}
{{--                                   accept="image/png, image/jpeg"--}}
{{--                            >--}}
{{--                        </div>--}}
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="col-6">
                                <label for="listingimages" class="form-label">Upload Image(s)</label>
                                <input
                                    class="form-control"
                                    type="file"
                                    id="listingimages"
                                    multiple
                                    name="listingimages[]"
{{--                                    accept="image/png, image/jpeg"--}}
                                    accept="image/*"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- 16 User ID (Hidden) --}}
                    <div class="form-group">

                        {{-- When edit a listing --}}
                        @if(isset($listing))
                            <input type="number" name="user_id" hidden class="form-control" value="{{ $listing->user_id }}">
                            <input hidden name="listing_id" value="{{ $listing->id }}">
                        @endif

                        {{-- When create a listing --}}
                        @if (isset($user))
                            <input type="number" name="user_id" hidden class="form-control" value="{{ $user }}">
                        @endif

                    </div>

                    {{-- 17 Submit Button --}}
                    <div class="text-center mb-3">
                        <button type="submit" class="custom-btn btn-1 purple-ice">
                            @if(isset($listing))
                                Save Listing
                            @else
                                Add Listing
                            @endif
                        </button>
                    </div>

                </form> <!-- end form -->
            </div> <!-- card-body form-bg p-5 -->
        </div> <!-- card edit-form p-3 -->
    </div> <!-- container -->

@endsection
