<div class="d-flex justify-content-center">
    <div class="p-2">
        <button class="btn btn-outline-primary" wire:click="addFolder">Add Folder</button>
        <button class="btn btn-outline-success" wire:click="doScan"  wire:target="doScan" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#scanModal">
            <span class="d-none" wire:target="doScan" wire:loading.class.remove="d-none" >
                Scanning...
            </span>
            <span wire:target="doScan" wire:loading.class="d-none">
                Scan
            </span>
        </button>

        <!-- <button type="button" class="btn btn-primary" >
            Launch demo modal
        </button> -->


        @foreach ($paths as $path)
            <div class="mt-4">
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

    @teleport('body')
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="scanModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"  aria-labelledby="scanModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close d-none" id="closeScanModal" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="w-100 d-flex jusitfy-content-center py-3">
                    <div class="w-100">
                        <h2>Scanning...</h2> 
                        <div wire:stream="current_track" style="min-height: 50px; overflow:hidden;"></div>
                        <span wire:stream="count">{{ $progress . '%' }}</span>
                        <div class="progress" wire:stream="count_progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"  role="progressbar" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        var scanModal = new bootstrap.Modal(document.getElementById('scanModal'))

        Livewire.on('close-scan-modal', (event) => {
            console.log('test')
            scanModal.hide()
        });
    </script>
    @endteleport
</div>


