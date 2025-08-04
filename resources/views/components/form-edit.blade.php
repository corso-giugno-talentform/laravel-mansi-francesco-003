<div class="container px-4 py-5 my-5">
    <div class="col-lg-6 mx-auto">
        @if (session('success'))
            <x-alert color="alert-success"> {{ session('success') }}</x-alert>
        @endif
        <x-errors-all />
        {{ $slot }}
        <form class="" action="{{ route('books.update', ['book' => $book]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome Libro</label>
                <input type="text" class="form-control @error('name') is-invalid    @enderror" id="inputName"
                    name="name" value="{{ $book->name }}">


            </div>
            <div class="mb-3">
                <label for="inputSurName" class="form-label">Anno di Scrittura</label>
                <input type="text" class="form-control" id="inputSurName" name="year" value="{{ $book->year }}">
                @error('year')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Pagine del libro</label>
                <input type="text" class="form-control" id="inputEmail" name="page" value="{{ $book->page }}">
                @error('page')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputAuthor" class="form-label">Scegli Autore</label>

                <select name="author_id" class="form-select" id="inputAuthor">


                    <option @if (!$book->author_id) selected @endif>Seleziona un Autore</option>
                    @foreach ($authors as $author)
                        <option @if ($author->id == $book->author_id) selected @endif value="{{ $author->id }}">
                            {{ $author->firstname . ' ' . $author->lastname }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <img style="height:100px" src="{{ Storage::url($book->image) }}" alt="">
                <label for="formFile" class="form-label">Immagine Cover Attuale</label>
                <input class="form-control" type="file" id="formFile" name="image" value="{{ $book->image }}">
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
</div>
