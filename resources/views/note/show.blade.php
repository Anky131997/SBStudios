<x-app-layout>
    <div class="single-note note-container">
        <div class="note-header">
            <h1>{{ $note->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                <button class="note-delete-button">Delete</button>
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $note->note }}
            </div>
        </div>
    </div>
</x-app-layout>
