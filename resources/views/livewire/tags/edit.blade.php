   <div class="col-lg-6 mx-auto">
       @if (session('success'))
           <x-alert color="alert-success"> {{ session('success') }}</x-alert>
       @endif
       <x-errors-all />

       <form>

           <div class="mb-3">
               <label for="inputName" class="form-label">Nome Tag</label>
               <input type="text" wire:model="name" class="form-control @error('name') is-invalid    @enderror"
                   id="inputName">


           </div>


           <button type="button" wire:click="update" class="btn btn-primary">Aggiorna</button>
       </form>
   </div>
