 <x-layout>
     <section>
         <div class="d-flex">
             <h2>I Libri Inseriti</h2>
             <a class="btn btn-info" href="{{ route('books.create') }}">Crea Nuovo Libro</a>
         </div>
         <ul>
             @foreach ($books as $book)
                 <li>
                     <img style="width:20px" src="{{ $book->image ? Storage::url($book->image) : '/images/default.png' }}"
                         alt="" srcset="">{{ $book->name }}
                 </li>
             @endforeach
         </ul>
     </section>
 </x-layout>
