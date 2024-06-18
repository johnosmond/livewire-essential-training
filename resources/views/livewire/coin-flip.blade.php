<div>
    {{ $coin }}
    <form wire:submit.prevent="flipCoin">
        <button type="submit">Flip Coin</button>
    </form>
</div>
