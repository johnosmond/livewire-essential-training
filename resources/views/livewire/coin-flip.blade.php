<div wire:poll.5s="flipCoin">
    <p>{{ $coin }}</p>
    <form wire:submit.prevent="flipCoin">
        <button type="submit">Flip Coin</button>
    </form>
    <p>Last flip: {{ $last }}</p>
</div>
