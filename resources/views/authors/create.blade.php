<x-layout>
    <div class="container px-4 py-5 my-5">
        <div class="col-lg-6 mx-auto">
            @if (session('success'))
                <x-alert color="alert-success"> {{ session('success') }}</x-alert>
            @endif
            <x-errors-all />

            <form class="" action="{{ route('authors.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputName" class="form-label">Nome Autore</label>
                    <input type="text" class="form-control @error('firstname') is-invalid    @enderror" id="inputName"
                        name="firstname" value="{{ old('firstname') }}">


                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label">Cognome Autore</label>
                    <input type="text" class="form-control @error('lastname') is-invalid    @enderror" id="inputName"
                        name="lastname" value="{{ old('lastname') }}">


                </div>

                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>
    </div>

</x-layout>
