<?php

namespace App\Http\Livewire;


use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateAnnouncement extends Component
{   

    public $title;
    public $body;
    public $price;
    public $category;
   
        protected $rules =
        [
            'title' => 'required|min:4',
            'body' => 'required|min:8',
            'category' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
        ];


    public function store()
    {
        
       $this->validate();
      
       $category = Category::find($this->category);
        
       $announcement =  $category->announcements()->create([
         'title' => $this->title,
         'body' =>  $this->body,
         'price' => $this->price,
       ]);
       
       Auth::user()->announcements()->save($announcement);

        session()->flash('success', 'annuncio creato con successo');
       $this->clearForm();
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
