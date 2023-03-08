<?php

namespace App\Http\Livewire;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{   

    use WithFileUploads;

    public $announcement;
    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcementId;
    public $mode = 'create';
    
    public function rules()
    {
        if($this->mode == 'edit'){
            return  [
            'category' => 'required',
            'title' => 'required|min:4',
            'body' => 'required|min:8',
            'price' => 'required|numeric',
            'images.*'=> 'required|image|max:1024',
            'temporary_images.*' => 'image|max:1024',
        ];
        }else{
            return [
                'category' => 'required',
                'title' => 'required|min:4',
                'body' => 'required|min:8',
                'price' => 'required|numeric',
                'images.*'=> 'required|image|max:1024',
                'temporary_images.*' => 'image|max:1024',
                'temporary_images' => 'required'
            ];
        }
    }

    // protected $messages = [
    //     'required' => 'Il campo :attribute è richiesto',
    //     'min' => 'Il campo :attribute è troppo corto',
    //     'numeric' => 'Il campo deve essere numerico',
    //     'temporary_images.required' => 'L\'immagine è richiesta',
    //     'temporary_images.*.image' => 'I file devono essere immagini',
    //     'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 1 mb',
    //     'images.*.image' => 'L\'immagine dev\'essere di tipo immagine',
    //     'images.*.max' => 'L\'immagine dev\'essere massimo di 1 mb',

    // ];

    protected $listeners = [
        'edit',
        'delete',
    ];

    public function updatedTemporaryImages()
    {
        if($this->validate([
             'temporary_images.*' => 'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

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
            // $this->mode = 'create';
            // $announcement = new Announcement();
            // $announcement->title = $this->title;
            // $announcement->body = $this->body;
            // $announcement->price = $this->price;
            // $announcement->category()->associate($category);
            // Auth::user()->announcements()->save($announcement);
            $this->mode = 'create';
            $this->announcement = $category->announcements()->create($this->validate());
            $this->announcement->user()->associate(Auth::user());
            $this->announcement->save(); 
            if(count($this->images)){
                foreach($this->images as $image){
                    //$this->announcement->images()->create(['path'=>$image->store('images_announcement', 'public')]);
                    $newFileName = "annoucements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                    dispatch(new ResizeImage($newImage->path, 400, 300));
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
        } 


        session()->flash('success', 'annuncio ' . ($this->announcementId ? 'modificato' : 'creato') . ' con successo. In attesa di revisione!');

        $this->cleanForm();

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

    public function cleanForm()
    {
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];
    }

    public function render()
    {
       
        return view('livewire.create-announcement');
    }
}


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
