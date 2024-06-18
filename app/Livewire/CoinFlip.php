<?php

namespace App\Livewire;

use Livewire\Component;

class CoinFlip extends Component
{
    public $coin = 'Click to flip';

    public function flipCoin() {
        $this->coin = rand(0, 1) ? 'Heads' : 'Tails';
    }

    public function render()
    {
        return view('livewire.coin-flip');
    }
}
