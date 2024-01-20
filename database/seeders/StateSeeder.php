<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            [
                'title'  => 'reliable',
                'model' => 'user'
            ],
            [
                'title'  => 'unreliable',
                'model' => 'user'
            ],
            [
                'title'  => 'cancelled by seller',
                'model' => 'lot'
            ],
            [
                'title'  => 'complete and in excellent condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'partially complete, and in excellent condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'complete, in good condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'partially complete, in good condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'complete, in fair condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'partially complete, in fair condition',
                'model' => 'lot'
            ],
            [
                'title'  => 'new (in original packaging)',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'excellent condition',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'good condition',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'fair conditions',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'needs repair',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'for restoration',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'damaged',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'defective',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'refurbished',
                'model' => 'lotitem'
            ],
            [
                'title'  => 'cancelled by seller',
                'model' => 'order'
            ],
            [
                'title'  => 'cancelled by buyer',
                'model' => 'order'
            ],
            [
                'title'  => 'new',
                'model' => 'order'
            ],
            [
                'title'  => 'pending',
                'model' => 'order'
            ],
            [
                'title'  => 'processing',
                'model' => 'order'
            ],
            [
                'title'  => 'ready for shipping',
                'model' => 'orderitem'
            ],
            [
                'title'  => 'shipped',
                'model' => 'orderitem'
            ],
        ];

        foreach ($states as $state) {
            State::create($state);
        }
    }
}
