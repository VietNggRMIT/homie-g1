<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Livewire\Component;
use Livewire\WithPagination;

class TestSearch extends Component
{
    use WithPagination;
    //this page is currently useless lol
    // public $searchName; //listing name or user name
    // public $searchAddress;
    // public $filterRating; //options for 5, 4, 3, 2, 1 star, or unrated; default: show all

    //perhaps filter by price range? checkboxes?

    //price(high-low); price(low-high); most recently created; most recently updated; most applications
    //default: by id ascending
    public $order = null; 

    public function render()
    {
        return view('livewire.test-search');
    }
    
    public function filter(){
        // $this->emitTo('test-show', 'reloadListings', $this->searchName, $this->searchAddress);
    }
}
