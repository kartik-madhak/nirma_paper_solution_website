<div>
    {{-- Stop trying to control. --}}

    <a wire:click.prevent="vote(1)" href="#">+</a>
    {{votes_sum}}
    <a wire:click.prevent="vote(-1)"href="#">-</a>
    @if($voted)
    <div style="font-size:11px; color:red">Already Voted</div>
    @endif
</div>
