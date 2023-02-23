<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

// class CreateAnnouncement extends Component
// {   

//     public $title;
//     public $body;
//     public $price;
//     public $category;
    
//     protected $listeners = [
//         'edit',
//     ];

//     protected $rules =
//     [
//         'title' => 'required|min:4',
//         'body' => 'required|min:8',
//         'category' => 'required',
//         'price' => 'required|numeric',
//         'category' => 'required',
//     ];



//     public function store()
//     {
        
//        $this->validate();
      
//        $category = Category::find($this->category);
        
//        $announcement =  $category->announcements()->create([
//          'title' => $this->title,
//          'body' =>  $this->body,
//          'price' => $this->price,
//        ]);
       
//         Auth::user()->announcements()->save($announcement);

//         session()->flash('success', 'annuncio creato con successo');

//         $this->clearForm();

//         $this->emitTo('list-announcements', 'loadData');   
//     }


//     public function edit($id)
//     {
//     $announcement = Announcement::find($id);

//     $this->title = $announcement->title;
//     $this->body = $announcement->body;
//     $this->price = $announcement->price;
//     $this->category = $announcement->category_id;
//     $announcement->update();
//     }

//     public function updated($propertyName)
//     {
//         $this->validateOnly($propertyName);
//     }



//     public function clearForm()
//     {
//         $this->title = '';
//         $this->body = '';
//         $this->price = '';
//         $this->category = '';
//     }

//     public function render()
//     {
//         $categories = Category::all();
//         return view('livewire.create-announcement', compact('categories'));
//     }
// }


class CreateAnnouncement extends Component
{   
    public $announcement;
    
    protected $listeners = [
        'edit',
    ];

    protected $rules =
    [
        'announcement.title' => 'required|min:4',
        'announcement.body' => 'required|min:8',
        'announcement.category' => 'required',
        'announcement.price' => 'required|numeric',
    ];

    public function mount()
    {
        $this->announcement = new Announcement();
    }

    public function store()
    {
        $this->validate();
        
        $category = Category::find($this->announcement->category);
        
        $announcement = new Announcement([
            'title' => $this->announcement->title,
            'body' =>  $this->announcement->body,
            'price' => $this->announcement->price,
        ]);
       
        $category->announcements()->save($announcement);
        
        Auth::user()->announcements()->save($announcement);

        session()->flash('success', 'Annuncio creato con successo');

        $this->clearForm();

        $this->emitTo('list-announcements', 'loadData');   
    }

    public function edit($id)
    {
        $this->announcement = Announcement::find($id);
    }


    public function clearForm()
    {
        $this->announcement = new Announcement();
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
