<?php

namespace App\Http\Livewire;
use App\Models\Blog;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class BlogResults extends Component
{
    public $searchName = '';
    public $order = 'byID';
    public $searched = false;
    public $everChanged = false;

    /*****************************************************************************
    The code below uses elements from:
    *Title: Pagination
    *Author: Laravel Livewire
    *Code version: 2.x
    *Availability: https://laravel-livewire.com/docs/2.x/pagination (Accessed 2 January 2023)
    *****************************************************************************/

    public function filter()
    {
        // $this->resetPage();
        // $this->setPage(1);
        if($this->searchName != '' || $this->order != 'byID'){
            $this->searched = true;
            $this->everChanged = true;
        }
        else{
            $this->searched = false;
        }
    }
    /*****************************************************************************
    The code below uses elements from:
    *Title: Lifecycle Hooks
    *Author: Laravel Livewire
    *Code version: 2.x
    *Availability: https://laravel-livewire.com/docs/2.x/pagination (Accessed 2 January 2023)
    *****************************************************************************/
    public function updatedsearchName(){
        // $this->resetPage();
        // $this->setPage(1);
        if($this->searchName != '' || $this->order != 'byID'){
            $this->searched = true;
            $this->everChanged = true;
        }
        else{
            $this->searched = false;
        }
    }

    public function resetAll(){
        $this->reset(['searchName', 'order', 'searched']);
        return redirect('/blogs');
    }

    public function render()
    {
        if($this->searchName || $this->order != 'byID'){
            $this->searched = true;
            $this->everChanged = true;
        }
        else{
            $this->searched = false;
        }
        $blogs = Blog::with('user')
        //query starts below
        ->where('blog_name', 'like', '%' . $this->searchName . '%');

        //order blogs
        switch($this->order){ //order search results
            case 'created':
                $blogs = $blogs->orderBy('created_at', 'desc');
                break;
            case 'updated':
                $blogs = $blogs->orderBy('updated_at', 'desc');
                break;
            default:
                $blogs = $blogs->orderBy('id', 'asc');
        }

        /*****************************************************************************
        The code below uses elements from:
        *Title: Quickstart
        *Author: Laravel Livewire
        *Code version: 2.x
        *Availability: https://laravel-livewire.com/docs/2.x/quickstart (Accessed 30 December 2022)
        *****************************************************************************/
        if($this->searchName != '' || $this->order != 'byID'){ //some search going on -> no pagination
            return view('livewire.blog-results', [
                'blogs' => $blogs->get(),
                'searched' => $this->searched,
                'total' => $blogs->count(),
                'everChanged' => $this->everChanged,
            ]);
        }
        else{
            return view('livewire.blog-results', [
                'blogs' => $blogs->paginate(15),
                'searched' => $this->searched,
                'everChanged' => $this->everChanged,
            ]);
        }

    }
}
