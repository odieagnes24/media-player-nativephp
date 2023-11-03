<div class="card placeholder-glow">
    @for ($i = 1; $i <= 20; $i++)
        <div class="list-group card-list-group">
            <div class="list-group-item">
                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <div class="avatar placeholder"></div>
                    </div>
                    <div class="col">
                        <div class="placeholder placeholder-xs col-4"></div>
                    <div class="text-muted">
                        <div class="placeholder placeholder-xs col-2"></div>
                    </div>
                    </div>
                    <div class="col-auto text-muted">
                        --:--
                    </div>
                    <div class="col-auto">
                    </div>
                    <div class="col-auto lh-1">
                    </div>
                </div>
            </div>
        </div> 
    @endfor
</div>