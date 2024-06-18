<?php

namespace App\Livewire;

use Livewire\Component;

class CoinFlip extends Component
{
    public $coin = 'Click to flip';
    public string $last = '';

    public function mount() {
        $this->flipCoin();
    }

    public function placeholder() {
        return '<div>Looking for a coin...</div>';
    }

    public function flipCoin() {
        // sleep(5);
        $this->last = $this->coin;
        $this->coin = rand(0, 1) ? 'Heads' : 'Tails';
    }

    public function render()
    {
        return view('livewire.coin-flip');
    }
}
