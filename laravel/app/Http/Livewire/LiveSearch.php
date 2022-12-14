<?php
    /*****************************************************************************
    *Title: Quickstart
    *Author: Laravel Livewire
    *Code version: 2.x
    *Availability: https://laravel-livewire.com/docs/2.x/quickstart (Accessed 30 December 2022)
    *****************************************************************************/
namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;

class LiveSearch extends Component
{
    public $searchTerm = '';
    public $listings;

    public function render()
    {
        if (empty($this->searchTerm)) {
            $this->listings = Listing::where('listing_address_subdivision_1', $this->searchTerm)
                ->get();
        } else {
            $this->listings = Listing::
            inRandomOrder()
                ->where('listing_name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('listing_description', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('listing_address_subdivision_1', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('listing_address_subdivision_2', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('listing_address_subdivision_3', 'like', '%'.$this->searchTerm.'%')
                ->withAvg('reviews', 'review_rating')
                ->withCount('reviews')
                ->withCount('applications')
                ->limit(10)
                ->get();
        }
        return view('livewire.live-search');
    }
}
