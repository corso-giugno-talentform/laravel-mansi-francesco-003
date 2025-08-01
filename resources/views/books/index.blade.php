 <x-layout>
     <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

         <div class="container mt-5">
             <div class="align-middle gap-2 d-flex justify-content-between">
                 <h3>Elenco Libri inseriti</h3>
                 <form class="d-flex" role="search" action="#" method="POST">
                     <input class="form-control me-2" name="search" type="search" placeholder="Cerca Libro"
                         aria-label="Search">
                 </form>
                 <a href="{{ route('books.create') }}" type="button" class="btn btn btn-success me-md-2">
                     Crea Nuovo Libro
                 </a>
             </div>
             <table class="table border mt-2">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Immagine</th>
                         <th scope="col">Titolo</th>
                         <th scope="col"></th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($books as $book)
                         <tr>
                             <th scope="row">#{{ $book->id }}</th>
                             <td>
                                 <img class="card-img-top" style="width:3rem"
                                     src="{{ isset($book->image) ? Storage::url($book->image) : '/images/default.png' }}"
                                     alt="..." />
                             </td>
                             <td>{{ $book->name }}</td>
                             <td>

                                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                     <a href="{{ route('books.show', ['book' => $book]) }}"
                                         class="btn btn-primary me-md-2">
                                         Visualizza
                                     </a>
                                     <a href="{{ route('books.edit', ['book' => $book]) }}"
                                         class="btn btn-warning me-md-2">
                                         Modifica
                                     </a>
                                     <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger me-md-2">Elimina</button>

                                     </form>
                                 </div>
                             </td>
                         </tr>
                     @endforeach

                 </tbody>
             </table>
         </div>
     </div>
 </x-layout>
