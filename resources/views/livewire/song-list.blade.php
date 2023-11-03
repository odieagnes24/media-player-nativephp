<div class="card">
  @foreach ($tracks as $track)
    <div class="list-group card-list-group">
        <div class="list-group-item">
          <div class="row g-2 align-items-center">
            <div class="col-auto">
              <img src="data:image/jpeg;base64,{{ base64_encode($track->picture) }}" class="rounded" alt="Song" width="40" height="40">
            </div>
            <div class="col">
                {{ $track->title }}
              <div class="text-muted">
                {{ $track->artist }}
              </div>
            </div>
            <div class="col-auto text-muted">
              03:41
            </div>
            <div class="col-auto">
              <a href="#" class="link-secondary">
                <button class="switch-icon" data-bs-toggle="switch-icon">
                  <span class="switch-icon-a text-muted">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                  </span>
                  <span class="switch-icon-b text-red">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                  </span>
                </button>
              </a>
            </div>
            <div class="col-auto lh-1">
              <div class="dropdown">
                <a href="#" class="link-secondary" data-bs-toggle="dropdown"><!-- Download SVG icon from http://tabler-icons.io/i/dots -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item" href="#">
                    Action
                  </a>
                  <a class="dropdown-item" href="#">
                    Another action
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  @endforeach
   
</div>