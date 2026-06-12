# LaraVibe

A cross-platform **desktop music player** built with [Laravel](https://laravel.com), [Livewire](https://livewire.laravel.com), and [NativePHP](https://nativephp.com) (Electron). Point it at folders of local audio files, scan them into a library, and play them back with a scrolling, DJ-style waveform.

---

## Features

- **Local library scanning** — recursively scan one or more folders for `mp3`, `flac`, and `ogg` files. Tags (title, artist, album, duration, embedded cover art) are read with [getID3](https://github.com/JamesHeinrich/getID3), preferring Unicode-aware tag blocks (`id3v2` / `vorbiscomment`) so non-Latin titles aren't mangled.
- **Waveform playback** — powered by [wavesurfer.js](https://wavesurfer.xyz/), zoomed in and auto-scrolling to follow the playhead, with drag-to-seek.
- **Full playback controls** — play / pause, next / previous, shuffle, repeat (off → all → one), volume + mute.
- **Library views** — browse by **List**, **Favorites**, **Albums**, or **Artist**.
- **Favorites** — heart any track from the list or directly from the now-playing bar.
- **Clickable now-playing bar** — the title jumps to its **album**, the artist jumps to its **artist**.
- **Resume where you left off** — the active queue, position, shuffle/repeat mode, and volume are persisted to `localStorage` and restored on launch (paused at your last spot).
- **Light / dark theme** toggle, with the waveform recoloring to match.

## Tech stack

| Layer         | Technology                            |
|---------------|---------------------------------------|
| Framework     | Laravel 12 (PHP 8.2+)                 |
| UI            | Livewire 3 + Blade + Tabler-style CSS |
| Desktop shell | NativePHP Desktop v2 (Electron)       |
| Audio engine  | wavesurfer.js 7                       |
| Tag reading   | james-heinrich/getid3                 |
| Build tool    | Vite                                  |

---

## Requirements

- **PHP** 8.2+ with the `gd` extension (cover-art decoding) enabled
- **Composer**
- **Node.js** + npm
- A database (the desktop build uses **SQLite** by default; see below)

## Installation

```bash
# 1. Install PHP and JS dependencies
composer install
npm install

# 2. Environment
cp .env.example .env
php artisan key:generate

# 3. Database — create the schema
php artisan migrate

# 4. Install the NativePHP Electron shell
php artisan native:install
```

> **Database note:** the desktop app runs against a local **SQLite** file so each user has a self-contained library. To use SQLite, set the following in `.env` and create the database file:
>
> ```env
> DB_CONNECTION=sqlite
> ```
> ```bash
> touch database/database.sqlite   # Windows (PowerShell): New-Item database/database.sqlite
> php artisan migrate
> ```

---

## Running

### Desktop app (development)

Runs the Electron window and the Vite dev server together:

```bash
composer native:dev
```

…or run the native shell directly:

```bash
php artisan native:run
```

### In the browser (Livewire only)

Useful for iterating on UI without launching Electron:

```bash
php artisan serve
npm run dev
```

The library lives at the **`/tracks`** route.

---

## Usage

1. Launch the app and open **Settings** (the gear icon, top-right of the player bar).
2. Click **Add folder** and choose a directory containing your music.
3. Hit **Scan**. A progress modal shows tracks being analyzed; when it finishes, your library populates and a desktop notification fires.
4. Click any track to play it. The current view (List / Favorites / Album / Artist) becomes the play queue.
5. Tap the **♥** on a track — or on the now-playing bar — to add it to **Favorites**.
6. In the now-playing bar, click the **title** to open its album or the **artist** to open that artist's tracks.

> Removing a folder or a track only removes it from **LaraVibe's library and cached art** — your actual audio files on disk are never touched.

---

## How it works

- **Scanning** ([`app/Livewire/Settings.php`](app/Livewire/Settings.php)) walks each saved `Path` recursively, collects supported files, and processes them in chunks while streaming progress to the UI. Each file is `updateOrCreate`d into the `tracks` table keyed by its path (so rescans are idempotent), and embedded cover art is written via `Storage::disk('public')`.
- **Serving media** ([`app/Http/Controllers/PlayerController.php`](app/Http/Controllers/PlayerController.php)) streams the raw audio file at `/readfile/{track}` and the cached cover at `/art/{track}`. Art is served through the public disk because NativePHP relocates it to a per-user writable folder.
- **Playback** ([`resources/views/livewire/player.blade.php`](resources/views/livewire/player.blade.php)) is entirely client-side. The `TrackList` component dispatches a `queue-play` browser event with the ordered queue (id, title, artist, album, art, favorite); the player script manages the queue, shuffle/repeat order, and persistence.
- **Cross-component actions** — the player bar's heart and title/artist links dispatch `player-favorite`, `player-open-album`, and `player-open-artist` events that the `TrackList` component listens for.

### Key routes

| Route               | Purpose                               |
|---------------------|---------------------------------------|
| `/tracks`           | Main library (the desktop app's home) |
| `/settings`         | Folder management + scanning          |
| `/readfile/{track}` | Streams the audio file                |
| `/art/{track}`      | Serves cached cover art               |

---

## Building a distributable

```bash
php artisan native:build
```

This produces a platform installer (e.g. a Windows `*-setup.exe`) under the generated `nativephp/` build directory. That directory is **git-ignored** — it's regenerated on each build.

---

## License

Released under the [MIT License](https://opensource.org/licenses/MIT).
