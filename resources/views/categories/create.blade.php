<x-layout>
    <div class="container px-4 py-5 my-5">
        <div class="col-lg-6 mx-auto">
            @if (session('success'))
                <x-alert color="alert-success"> {{ session('success') }}</x-alert>
            @endif
            <x-errors-all />

            <form class="" action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="inputName" class="form-label">Nome Categoria</label>
                    <input type="text" class="form-control @error('name') is-invalid    @enderror" id="inputName"
                        name="name" value="{{ old('name') }}">


                </div>


                <button type="submit" class="btn btn-primary">Salva</button>
            </form>
        </div>
    </div>

</x-layout>
