<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListAnnouncements extends Component
{

    public $announcements;

   protected $listeners = [
        'loadData',
    ];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->announcements = Auth::user()->announcements()->get();
    }

    public function editAnnouncement($id)
    {
        $this->emitTo('create-announcement', 'edit', $id);
    }

    public function deleteAnnouncement($id){
         $this->emitTo('create-announcement', 'delete', $id);
    }

    public function render()
    {

        return view('livewire.list-announcements');
    }

}

