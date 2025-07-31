 <x-layout>
     <div class="container my-5">
         <div class="p-5 text-center bg-body-tertiary rounded-3">
             <h1 class="text-body-emphasis">{{ env('APP_NAME') }}</h1>
             <p class="lead">
                 Benvenuto nel portale piu grande del mondo sui libri.
             </p>
         </div>
         <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
             @foreach ($books as $book)
                 <div class="col">
                     <div class="card">
                         <img src="{{ isset($book->image) ? Storage::url($book->image) : '/images/default.png' }}"
                             class="card-img-top" alt="...">
                         <div class="card-body">
                             <h5 class="card-title">{{ $book->name }}</h5>
                             <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                                 to
                                 additional content. This content is a little bit longer.</p>
                         </div>
                     </div>
                 </div>
             @endforeach



         </div>
     </div>
 </x-layout>
