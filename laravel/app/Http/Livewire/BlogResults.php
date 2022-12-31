<?php

namespace App\Http\Livewire;
use App\Models\Blog;
use App\Models\User;
use Livewire\Component;

class BlogResults extends Component
{
    public $searchName = '';
    public $order = '';

    public function filter()
    {
        $this->resetPage();
    }

    public function resetAll(){
        $this->reset(['searchName', 'order']);
    }

    public function render()
    {
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
        
        return view('livewire.blog-results', [
            'blogs' => $blogs->paginate(15)
        ]);
    }
}
