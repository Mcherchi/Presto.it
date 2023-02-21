<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;

class CreateAnnouncement extends Component
{   

    public $announcement;

   
        protected $rules =
        [
            'announcement.title' => 'required|min:4',
            'announcement.body' => 'required|min:8',
            'announcement.price' => 'required|numeric',
        ];
    

    public function newAnnouncement()
    {
        $this->announcement = new Announcement();
    }

    public function mount()
    {
        $this->newAnnouncement();
    }

    public function store()
    {
        $this->validate();
        
        $this->announcement->save();

        session()->flash('success', 'annuncio creato con successo');

        $this->newAnnouncement();
    }

     public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
