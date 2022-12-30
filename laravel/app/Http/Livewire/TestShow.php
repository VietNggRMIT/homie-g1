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
    public $filterRating = '';
    public $filterPrice = [];
    public $debug = '';

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
        $listings = Listing::with('user')
        ->with('listingimages:listing_image_path,listing_id')
        ->withAvg('reviews', 'review_rating')
        ->withCount('reviews')
        ->withCount('applications')
        //querying starts below
        ->where('listing_name', 'like', '%'. $this->searchName .'%')
        ->where(function ($query) {
            $query->where('listing_address_subdivision_1', 'like', '%'. $this->searchAddress .'%')
            ->orWhere('listing_address_subdivision_2', 'like', '%'. $this->searchAddress .'%')
            ->orWhere('listing_address_subdivision_3', 'like', '%'. $this->searchAddress .'%');
        });

        if($this->filterRating){ //filter by rating
            switch ($this->filterRating){
                case '5star':
                    $listings = $listings->having('reviews_avg_review_rating', '=', '5');
                    break;
                case '4star':
                    $listings = $listings->having('reviews_avg_review_rating', '<', '5')
                    ->having('reviews_avg_review_rating', '>=', '4');
                    break;
                case '3star':
                    $listings = $listings->having('reviews_avg_review_rating', '<', '4')
                    ->having('reviews_avg_review_rating', '>=', '3');
                    break;
                case '2star':
                    $listings = $listings->having('reviews_avg_review_rating', '<', '3')
                    ->having('reviews_avg_review_rating', '>=', '2');
                    break;
                case '1star':
                    $listings = $listings->having('reviews_avg_review_rating', '<', '2')
                    ->having('reviews_avg_review_rating', '>', '0');
                    break;
                case 'unrated':
                    $listings = $listings->having('reviews_avg_review_rating', '=', '0');
                    break;
                default:
                    
            }
        }
        if(!empty($this->filterPrice)){ //filter by price, not working, dont test
            $listingsOver9 = $listings->where('listing_price', '>=', '9000000');
            $listings69 = $listings->where('listing_price', '<', '9000000')
                ->where('listing_price', '>=', '6000000');
            $listings36 = $listings->where('listing_price', '<', '6000000')
                ->where('listing_price', '>=', '3000000');
            $listings03 = $listings->where('listing_price', '<', '3000000');

            $custom_listings = new $listings;

            if(in_array('rentOver9', $this->filterPrice)){ //first element is in
                $custom_listings->union($listingsOver9);
            }

            if(in_array('rent69', $this->filterPrice)){
                $custom_listings->union($listings69);
            }
            if(in_array('rent36', $this->filterPrice)){
                $custom_listings->union($listings36);
            }
            if(in_array('rent03', $this->filterPrice)){
                $custom_listings->union($listings03);
            }

            $listings = $custom_listings;
        }

        return view('livewire.test-show', [
            'listings' => $listings->paginate(30),
            'filterPrice' => $this->filterPrice,
            'debug' => $this->debug
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
