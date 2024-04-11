<?php

namespace App\Livewire\Forms;
use App\Models\Lot;
use App\Models\LotImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateLotForm extends Form
{
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

    #[Validate('image|max:1024')]
    public $image; // Ajoutez cette ligne

    public function store()
    {
        $this->all();
        $this->validate();

        $lot = Lot::create($this->all());
        // ray($lot);
        // if ($this->image) {
        //     $imageName = $this->image->store('images', 'public');
        //     // Obtenez les dimensions de l'image
        //     $dimensions = getimagesize($this->image->getRealPath());

        //     // Mettez à jour la table lot_images
        //     LotImage::create([
        //         'lot_id' => $lot->id,
        //         'image_path' => $imageName,
        //         'base64_normal' => base64_encode(file_get_contents($this->image->getRealPath())),
        //         'width' => $dimensions[0],
        //         'height' => $dimensions[1],
        //         'primary' => true, // ou false, selon votre logique
        //         // 'deleted_at' n'est généralement pas défini lors de la création
        //         // 'created_at' et 'updated_at' sont définis automatiquement par Laravel
        //         ]);
        // }
        $this->reset();
    }
}
