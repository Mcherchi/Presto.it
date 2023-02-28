<?php

// namespace App\Http\Livewire;

// use App\Models\Announcement;
// use App\Models\Category;
// use Illuminate\Support\Facades\Auth;
// use Livewire\Component;

// class CreateAnnouncement extends Component
// {   

//     public $title;
//     public $body;
//     public $price;
//     public $category;
//     public $announcementId;
//     public $mode = 'create';
    
//     protected $rules =
//     [
//         'category' => 'required',
//         'title' => 'required|min:4',
//         'body' => 'required|min:8',
//         'price' => 'required|numeric',
//     ];

//     protected $listeners = [
//         'edit',
//         'delete'
//     ];

//     public function store()
//     {
//         $this->validate();

//         $category = Category::find($this->category);
        
//         if ($this->announcementId) {
           
//             $announcement = Announcement::findOrFail($this->announcementId);
            
//             $announcement->update([
//                 'title' => $this->title,
//                 'body' => $this->body,
//                 'price' => $this->price,
//                 'category_id' => $category->id,
//             ]);
//         } else {
//             $this->mode = 'create';
//             $announcement = $category->announcements()->create([
//                 'title' => $this->title,
//                 'body' => $this->body,
//                 'price' => $this->price,
//             ]);
//             Auth::user()->announcements()->save($announcement);
//         }

//         session()->flash('success', 'annuncio ' . ($this->announcementId ? 'modificato' : 'creato') . ' con successo, In attesa di revisione');

//         $this->clearForm();

//         $this->emitTo('list-announcements', 'loadData');
//     }

//     public function edit($id)
//     {
//         $this->mode = 'edit';
//         $announcement = Announcement::findOrFail($id);
//         $this->announcementId = $id;
//         $this->category = $announcement->category_id;
//         $this->title = $announcement->title;
//         $this->body = $announcement->body;
//         $this->price = $announcement->price;
//     }

//     public function delete($id)
//     {
//         $announcement = Announcement::find($id);

//         if($announcement){
//             $announcement->delete();

//             session()->flash('success', 'Annnuncio eliminato');
//         }

//         $this->emitTo('list-announcements', 'loadData');
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

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAnnouncement extends Component
{   
    public $title;
    public $body;
    public $price;
    public $category;
    public $announcementId;
    public $mode = 'create';
    
    protected $rules = [
        'category' => 'required',
        'title' => 'required|min:4',
        'body' => 'required|min:8',
        'price' => 'required|numeric',
    ];

    protected $listeners = [
        'edit',
        'delete',
    ];

    public function store()
    {
        $this->validate();

        $category = Category::findOrFail($this->category);

        if ($this->announcementId) {
            $announcement = Announcement::findOrFail($this->announcementId);
            $announcement->title = $this->title;
            $announcement->body = $this->body;
            $announcement->price = $this->price;
            $announcement->is_accepted = null;
            $announcement->category()->associate($category);
            $announcement->save();
        } else {
            $this->mode = 'create';
            $announcement = new Announcement();
            $announcement->title = $this->title;
            $announcement->body = $this->body;
            $announcement->price = $this->price;
            $announcement->category()->associate($category);
            Auth::user()->announcements()->save($announcement);
        }

        session()->flash('success', 'annuncio ' . ($this->announcementId ? 'modificato' : 'creato') . ' con successo. In attesa di revisione!');

        $this->clearForm();

        $this->emitTo('list-announcements', 'loadData');
    }

    public function edit($id)
    {
        $this->mode = 'edit';
        $announcement = Announcement::findOrFail($id);
        $this->announcementId = $id;
        $this->category = $announcement->category->id;
        $this->title = $announcement->title;
        $this->body = $announcement->body;
        $this->price = $announcement->price;
    }

    public function delete($id)
    {
        $announcement = Announcement::find($id);

        if($announcement){
            $announcement->delete();

            session()->flash('success', 'Annnuncio eliminato');
        }

        $this->emitTo('list-announcements', 'loadData');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clearForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.create-announcement', compact('categories'));
    }
}
