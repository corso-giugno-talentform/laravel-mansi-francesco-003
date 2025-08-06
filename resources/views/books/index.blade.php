 <x-layout>
     <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

         <div class="container mt-5">
             <div class="align-middle gap-2 d-flex justify-content-between">
                 <h3>Elenco Libri inseriti ({{ $books->count() }})</h3>
                 <div>
                     <form class="input-group" role="search" action="{{ route('books.index') }}" method="GET">
                         <input class="form-control me-2" value="{{ request()->search ?? '' }}" name="search"
                             type="search" placeholder="Cerca Libro" aria-label="Search">
                         <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cerca</button>

                     </form>
                 </div>
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

                                     <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                         data-bs-target="#book-{{ $book->id }}">
                                         Elimina
                                     </button>
                                 </div>
                                 <!-- Button trigger modal -->


                                 <!-- Modal -->
                                 <div class="modal fade" id="book-{{ $book->id }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <form action="{{ route('books.destroy', ['book' => $book]) }}" method="POST"
                                         class="modal-dialog">
                                         @csrf
                                         @method('DELETE')
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h1 class="modal-title fs-5" id="exampleModalLabel">Attento! Operazione
                                                     non Reversibile!</h1>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                     aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 Sat per eliminare il libro: {{ $book->name }}

                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     data-bs-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-danger">SI, Elimina</button>
                                             </div>
                                         </div>
                                     </form>
                                 </div>
                             </td>
                         </tr>
                     @endforeach

                 </tbody>
             </table>
             {{-- https://laravel.com/docs/12.x/pagination#customizing-the-pagination-view --}}
             {{-- {{ $books->links() }} --}}
         </div>
     </div>
 </x-layout>
