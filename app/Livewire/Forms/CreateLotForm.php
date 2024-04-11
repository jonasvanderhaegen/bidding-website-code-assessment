<?php

namespace App\Livewire\Forms;
use App\Models\Lot;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\LotImage;
use Livewire\WithFileUploads;

class CreateLotForm extends Form
{
    use WithFileUploads;
    #[Validate('required')]
    public string $datetime_start = '';

    #[Validate('required')]
    public string $datetime_end = '';

    #[Validate('required|decimal:2')]
    public string $min_bid_amount = '';

    #[Validate('required|string')]
    public string $name = '';

    #[Validate('required:string')]
    public string $meta_description = '';

    #[Validate('required|string')]
    public string $short_description = '';

    #[Validate('required|string')]
    public string $long_description = '';

    #[Validate('required|decimal:2')]
    public string $total_estimated_value = '';

    #[Validate('required|integer')]
    public int $priority = 1;
    #[Validate('required|boolean')]
    public bool $status = false;

    #[Validate('required')]
    public string $state_id = '';
    #[Validate('required|image|max:1024')]
    public $image;  
    public function store()
    {
        $this->all();
        $this->validate();
        $lot = Lot::create($this->all());
        ray($lot);
        if ($this->image) {
            $imageName = $this->image->store('images', 'public');
            // Obtenez les dimensions de l'image
            $dimensions = getimagesize($this->image->getRealPath());
            // Mettez à jour la table lot_images
            $lotImage = new LotImage();
            $lotImage->base64_normal = base64_encode(file_get_contents($this->image->getRealPath()));
            $lotImage->width = getimagesize($this->image->getRealPath())[0];
            $lotImage->height = getimagesize($this->image->getRealPath())[1];
            $lotImage->primary = true; // ou false, selon votre logique
            $lotImage->lot_id = $lot->id; // Assurez-vous d'avoir l'ID du lot
            $lotImage->save();
        }
        $this->reset();
    }
    // public function sto()
    // {
    //     $this->validate();
    
    //     $lot = Lot::create($this->all());
    
    //     // Enregistrez l'image dans la table lot-images
    //     $lotImage = new LotImage();
    //     $lotImage->base64_normal = base64_encode(file_get_contents($this->image->getRealPath()));
    //     $lotImage->width = getimagesize($this->image->getRealPath())[0];
    //     $lotImage->height = getimagesize($this->image->getRealPath())[1];
    //     $lotImage->primary = true; // ou false, selon votre logique
    //     $lotImage->lot_id = $lot->id; // Assurez-vous d'avoir l'ID du lot
    //     $lotImage->save();
    
    //     $this->reset();
    // }
}
