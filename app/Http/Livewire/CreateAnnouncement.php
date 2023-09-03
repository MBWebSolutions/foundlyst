<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $validated;
    public $temporary_images;
    public $images = [];
    public $announcement;

    protected $rules = [

        'title' => 'required|min:5',
        'body' => 'required|min:10',
        'price' => 'required|min:1|max:999999|not_in:0',
        'category'=> 'required',
        'images.*'=> 'image|max:1024',
        'temporary_images.*'=> 'image|max:1024',        
    ];

    protected $messages = [
        'required' => 'Il campo :attribute e\' richiesto',
        'min' => 'Il campo :attribute e\' troppo corto',
        'numeric' => 'Il campo :attribute dev\'essere un numero', 
        'temporary_images.*.max'=> 'L\' immagine dev\' essere massimo di 1mb',
        'temporary_images.*.image'=> 'I file devono essere immagini',
        'temporary_images.*.required'=> 'L\' immagine è richiesta',
        'images.image' => 'L\'immagine dev\'essere un file immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 1mb',
    ];


    public function updatedTemporaryImages(){
        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
    
    public function removeImage($key){
        if(in_array($key, array_keys($this->images)
        )){
            unset($this->images[$key]);
        }
    }

    public function store()
    { 
        $this->validate();
    //    $category=Category::find($this->category);
       
    //    $announcement = $category->announcements()->create([
    //     'title'=>$this->title,
    //     'body'=>$this->body,
    //     'price'=>$this->price,
    //    ]);

    //    Auth::user()->announcements()->save($announcement);


        $this->announcement=Category::find($this->category)->announcements()->create($this->validate());

        //riga di codice nuova
        Auth::user()->announcements()->save($this->announcement);

        if(count($this->images)){
        foreach($this->images as $image) {
            // $this->announcement->images()->create(['path'=>$image->store('images','public')]);
            $newFileName = "announcements/{$this->announcement->id}";
            $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

            RemoveFaces::withChain([          
            new ResizeImage($newImage->path , 300, 300),
            new ResizeImage($newImage->path , 500, 500),
            new GoogleVisionSafeSearch($newImage->id),
            new GoogleVisionLabelImage($newImage->id)
            ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
       
     
        // session()->flash('message', 'Annuncio inserito con successo!');
        $this->cleanForm();
       }
       
    session()->flash('message', 'Annuncio inserito con successo!');
    $this->cleanForm();

    }

      
    

    public function cleanForm(){
        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category ='';
        $this->images = [];
        $this->temporary_images = [];
    }

    

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    


    public function render()
    {
        return view('livewire.create-announcement');
    }
}
