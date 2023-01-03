<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Component;
//create a new livewire called 'listing-results' and move this there
class ListingResults extends Component
{
    use WithPagination;

    //the variables below are used to decide if there is any query
    public $searchName = '';
    public $searchAddress = '';
    public $filterRating = '';
    public $minPrice = 0;
    public $maxPrice = 20;
    public $order = 'byID';
    public $debug = '';
    public $searched = false;
    // public $homeLocation = '';
    protected $queryString = [
        'searchAddress' => ['except' => ''],
    ];
    public $isChanged = false; //check if the searchAddress term has been changed (backspace)
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
        $this->setPage(1);
        if($this->searchName || $this->searchAddress || $this->filterRating || $this->minPrice != 0 || $this->maxPrice != 20 ||$this->order != 'byID'){
            $this->searched = true;
        }
        else{
            $this->searched = false;
        }
    }
    public function addressChanged(){
        $this->isChanged = true;
    }
    public function updated(){
        $this->resetPage();
        $this->setPage(1);
        if($this->searchName || $this->searchAddress || $this->filterRating || $this->minPrice != 0 || $this->maxPrice != 20 ||$this->order != 'byID'){
            $this->searched = true;
        }
        else{
            $this->searched = false;
        }
    }
    public function render()
    {   if($this->searchName || $this->searchAddress || $this->filterRating || $this->minPrice != 0 || $this->maxPrice != 20 ||$this->order != 'byID'){
            $this->searched = true;
        }
        else{
            $this->searched = false;
        }
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
                    $listings = $listings->havingRaw('reviews_avg_review_rating is NULL');
                    break;
                default:
                    
            }
        }
        if($this->minPrice == $this->maxPrice){
            $lower = $this->minPrice * 1000000; //something like 3m
            $upper = $lower + 1000000;
            $listings = $listings->whereBetween('listing_price', [$lower, $upper]);
        }
        elseif($this->minPrice < $this->maxPrice){
            $lower = $this->minPrice * 1000000;
            $upper = $this->maxPrice * 1000000;
            $listings = $listings->whereBetween('listing_price', [$lower, $upper]);
        }   
        else{ //min > max? ok now the user is just messing with us

        }
        
        switch($this->order){ //order search results
            case 'priceAscending':
                $listings = $listings->orderBy('listing_price', 'asc');
                break;
            case 'priceDescending':
                $listings = $listings->orderBy('listing_price', 'desc');
                break;
            case 'created':
                $listings = $listings->orderBy('created_at', 'desc');
                break;
            case 'updated':
                $listings = $listings->orderBy('updated_at', 'desc');
                break;
            case 'mostApp':
                $listings = $listings->orderBy('applications_count', 'desc');
                break;
            default:
                $listings = $listings->orderBy('id', 'asc');
        }
        if($this->searchName || $this->searchAddress || $this->filterRating || $this->minPrice != 0 || $this->maxPrice != 20 ||$this->order != 'byID'){
            return view('livewire.listing-results', [
                'listings' => $listings->get(),
                'searched' => $this->searched,
                'total' => $listings->count(),
            ]);
        }
        else{ //no search terms
            return view('livewire.listing-results', [
                'listings' => $listings->paginate(30),
                'searched' => $this->searched,
            ]);
        }
    }
    public function resetPrice(){
        if($this->searchName || $this->searchAddress || $this->filterRating ||$this->order != 'byID'){
            $this->reset(['minPrice', 'maxPrice']); //some searches are still there
        }
        else{
            return redirect('/listings'); //no searches or filters in place
        }
    }
    public function resetAll(){
        // $this->reset(['searchName', 'searchAddress', 'filterRating', 'order', 'minPrice', 'maxPrice', 'searched']);
        return redirect('/listings');
    }
}
