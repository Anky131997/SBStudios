<x-app-layout>
    <div class="note-container single-note">
        <h1> {{ isset($note)? 'Edit Note' : 'Create New Note'}} </h1>
        <form action="{{ isset($note)? route('note.update', $note) : route('note.store')}}" method="POST" class="note">
            @csrf
            @if (isset($note))
                @method('PUT')
            @endif
            <textarea name="note" id=""rows="10" class="note-body" placeholder="Enter your note here">
                {{ isset($note)? $note->note : ''}}
            </textarea>
            <div class="note-buttons">
                <a href="{{ isset($note)? route('note.show', $note) : route('note.index') }}" class="note-cancle-button">Cancle</a>
                <button class="note-submit-button">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
