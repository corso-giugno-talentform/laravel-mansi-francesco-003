<div class="container px-4 py-5 my-5">
    <div class="col-lg-6 mx-auto">
        @if (session('success'))
            <x-alert color="alert-success"> {{ session('success') }}</x-alert>
        @endif
        <x-errors-all />
        {{ $slot }}
        <form class="" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="inputName" class="form-label">Nome Libro</label>
                <input type="text" class="form-control @error('name') is-invalid    @enderror" id="inputName"
                    name="name" value="{{ old('name') }}">


            </div>
            <div class="mb-3">
                <label for="inputSurName" class="form-label">Anno di Scrittura</label>
                <input type="text" class="form-control" id="inputSurName" name="year" value="{{ old('year') }}">
                @error('year')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Pagine del libro</label>
                <input type="text" class="form-control" id="inputEmail" name="page" value="{{ old('page') }}">
                @error('page')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputAuthor" class="form-label">Scegli Autore</label>

                <select name="author_id" class="form-select" id="inputAuthor">
                    <option selected>Seleziona un Autore</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->firstname . ' ' . $author->lastname }}</option>
                    @endforeach

                </select>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Immagine Cover</label>
                <input class="form-control" type="file" id="formFile" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</div>
