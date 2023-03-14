<?php

namespace App\Http\Livewire;

use App\Jobs\AddImageWatermark;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
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
    public $announcement_image = [];
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

            if(count($this->images)){
                foreach($this->images as $image){
                    //$this->announcement->images()->create(['path'=>$image->store('images_announcement', 'public')]);
                    $newFileName = "annoucements/{$announcement->id}";
                    $newImage = $announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                     RemoveFaces::withChain([
                        new AddImageWatermark($newImage->id),
                        new ResizeImage($newImage->path, 400, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);


                    
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        
        } else {
            $this->mode = 'create';
            $this->announcement = $category->announcements()->create($this->validate());
            $this->announcement->user()->associate(Auth::user());
            $this->announcement->save();

            if(count($this->images)){
                foreach($this->images as $image){
                    $newFileName = "annoucements/{$this->announcement->id}";
                    $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                    RemoveFaces::withChain([
                        new AddImageWatermark($newImage->id),
                        new ResizeImage($newImage->path, 400, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);

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
        $this->announcement_image = $announcement->images;
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

    public function removeAnnouncementImage($key)
    {
        $image = $this->announcement_image[$key];
        $image->delete();
        unset($this->announcement_image[$key]);

        session()->flash('success', 'Immagine eliminata');
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
        $this->announcement_image = [];
    }

    public function render()
    {
       
        return view('livewire.create-announcement');
    }
}
