    <div class="col-lg-6 mx-auto">
        @if (session('success'))
            <x-alert color="alert-success"> {{ session('success') }}</x-alert>
        @endif
        <x-errors-all />

        <form>
            <div class="mb-3">
                <label for="inputName" class="form-label">Nome Tag</label>
                <input wire:model.live.debounce.300ms="name" type="text"
                    class="form-control @error('name') is-invalid    @enderror" id="inputName">
            </div>


            <button wire:click="store" type="button" class="btn btn-primary">Salva</button>
        </form>
    </div>
