<div>
    <div class="p-2">
        <button wire:click="addFolder">Add Folder</button>
        <button wire:click="doScan" wire:target="doScan" wire:loading.attr="disabled">
            <span class="d-none" wire:target="doScan" wire:loading.class.remove="d-none" >
                Scanning...
            </span>
            <span wire:target="doScan" wire:loading.class="d-none">
                Scan
            </span>
        </button>

        @foreach ($paths as $path)
            <div>
                {{ $path->path }} 
                <a href="#" style="color: red;" wire:click.prevent="remove({{ $path->id }})" onclick="confirm('Do you want to remove this path?')||event.stopImmediatePropagation()">
                    <span class="d-none" wire:target="remove({{ $path->id }})" wire:loading.class.remove="d-none" >
                        Removing...
                    </span>
                    <span wire:target="remove({{ $path->id }})" wire:loading.class="d-none">
                        Remove
                    </span>
                </a>
            </div>
        @endforeach
    </div>
</div>
