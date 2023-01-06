{{-- /*****************************************************************************
The code below uses elements from:
*Title: Quickstart
*Author: Laravel Livewire
*Code version: 2.x
*Availability: https://laravel-livewire.com/docs/2.x/quickstart (Accessed 30 December 2022)
*****************************************************************************/ --}}

<div>
    <div>
        <div class="row blog-filter-group filter-section align-items-center mb-5 p-4">
            <div class="col col-lg-6 search-filter" role="search">
                <label class="h5" for="blog-search">Search by keywords</label>
                <input wire:model="searchName" wire:change="filter" class="form-control border-end-0 border rounded-pill p-2 search-name" type="text" placeholder="Enter your search..." aria-label="Search" id="blog-search">
                <!-- <button disabled class="btn btn-outline-success" type="submit">Search</button> -->

            </div>

            <div class="col col-lg-4">
                <label class="h5" for="order">Order blogs by</label>
                <select class="form-control" wire:model="order" id="order">
                    <option selected value="byID">Blog ID</option>
                    <option value="created">Most recently created</option>
                    <option value="updated">Most recently updated</option>
                </select>
            </div>

            <div class="col">
                <div>
                    <button class="btn btn-warning mt-4" wire:click="resetAll">Reset all queries</button>
                </div>
            </div>


        </div>

    </div>

    <div>
        <div class="container">
            <div class="text-center my-3">
                @if (!$searched)
                    Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} blogs from the total of {{ $blogs->total() }} blogs.
                @else
                    @isset($total)
                        Showing {{ $total }} results matching your search.
                    @endisset
                @endif
            </div>
            <div class="blog-listing-section">
                @foreach ($blogs as $blog)
                    <div class="card blog-card gy-3 px-3 py-2 mb-1 smooth-transition">
                        <div class="row align-items-center">

                            {{-- Left Col --}}
                            <div class="col-md-8">
                                <div class="row">
                                    <a class="card-title h5 mt-2 mb-3 smooth-transition" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                        {{ $blog->blog_name }}
                                    </a>
                                </div>
                                <div class="row">
                                    <p>
                                        <i class="fa-solid fa-hashtag purple-ice"></i>
                                        {{ $blog->id }}
                                        <i class="fa-solid fa-calendar-days"></i>
                                        Posted {{ $blog->created_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                    </p>
                                </div>
                            </div>

                            {{-- Right Col --}}
                            <div class="col-md-4">
                                <div class="row">
                                    <p>
                                        <i class="fa-regular fa-id-card"></i>
                                        <a class="user-name smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
{{--                                        <i class="fa-solid fa-hashtag purple-ice"></i>--}}
{{--                                        {{ $blog->user->id }}--}}
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="text-secondary text-opacity-25" data-toggle="tooltip" data-placement="top" title="{{ $blog->updated_at }}">
                                        Last updated {{ $blog->updated_at->diffForHumans(['parts' => 3, 'join' => ', ', 'short' => false]) }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination justify-content-center mt-5">
                {{-- below is the box containing links to different page. get it to center? --}}
                {{-- /*****************************************************************************
                The code below uses elements from:
                *Title: Pagination
                *Author: Laravel Livewire
                *Code version: 2.x
                *Availability: https://laravel-livewire.com/docs/2.x/pagination (Accessed 2 January 2023)
                *****************************************************************************/ --}}
                @if(!$everChanged)
                    <br><div>{{ $blogs->links('pagination::bootstrap-4') }}</div>
                @endif
                {{-- after changing the query back to null, remove pagination --}}
            </div>
        </div>
    </div>
</div>
