<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;

class TestShow extends Component
{
    use WithPagination;

    //the variables below are used to decide if there is any query
    public $searchName = '';
    public $searchAddress = '';

    // public $listings;
    // protected $listeners = ['reloadListings'];

    // public function mount(){
    //     $this->listings = Listing::with('user')
    //     ->with('listingimages:listing_image_path,listing_id')
    //     ->withAvg('reviews', 'review_rating')
    //     ->withCount('reviews')
    //     ->withCount('applications')->get();
    // }
    public function filter()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        // return view('livewire.test-show');
        return view('livewire.test-show', [
            'listings' => Listing::where('listing_name', 'like', '%'. $this->searchName .'%')
            // ->orWhere('listing_description', 'like', '%'. $this->searchName .'%')
            ->where(function ($query) {
                $query->where('listing_address_subdivision_1', 'like', '%'. $this->searchAddress .'%')
                ->orWhere('listing_address_subdivision_2', 'like', '%'. $this->searchAddress .'%')
                ->orWhere('listing_address_subdivision_3', 'like', '%'. $this->searchAddress .'%');
            })
            ->paginate(30)
        ]);

    }

    // public function reloadListings($searchName, $searchAddress){ 
    //     $this->listings = Listing::query(); //prep
    //     $this->searchName = $searchName;
    //     $this->searchAddress = $searchAddress;
    //     if($searchName){
    //         $this->listings = $this->listings->where('listing_name', 'like', '%'.$searchName.'%')
    //         ->orWhere('listing_description', 'like', '%'.$searchName.'%');
    //     }
    //     if($searchAddress){
    //         $this->listings = $this->listings->where('listing_address_subdivision_1', 'like', '%'.$searchAddress.'%')
    //         ->orWhere('listing_address_subdivision_2', 'like', '%'.$searchAddress.'%')
    //         ->orWhere('listing_address_subdivision_3', 'like', '%'.$searchAddress.'%');
    //     }
    //     $this->listings = $this->listings->get();
    // }
}
