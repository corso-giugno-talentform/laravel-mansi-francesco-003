 <x-layout>
     <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

         <div class="container mt-5">
             <div class="align-middle gap-2 d-flex justify-content-between">
                 <h3>Elenco Autori inseriti</h3>
                 <form class="d-flex" role="search" action="#" method="POST">
                     <input class="form-control me-2" name="search" type="search" placeholder="Cerca Autore"
                         aria-label="Search">
                 </form>
                 <a href="{{ route('authors.create') }}" type="button" class="btn btn btn-success me-md-2">
                     Crea Nuovo Autore
                 </a>
             </div>
             <table class="table border mt-2">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Nome</th>
                         <th scope="col">Cognome</th>
                         <th scope="col"></th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($authors as $author)
                         <tr>
                             <th scope="row">#{{ $author->id }}</th>

                             <td>{{ $author->firstname }}</td>
                             <td>{{ $author->lastname }}</td>
                             <td>

                                 <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                     <a href="{{ route('authors.show', ['author' => $author]) }}"
                                         class="btn btn-primary me-md-2">
                                         Visualizza
                                     </a>
                                     <a href="{{ route('authors.edit', ['author' => $author]) }}"
                                         class="btn btn-warning me-md-2">
                                         Modifica
                                     </a>

                                     <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                         data-bs-target="#author-{{ $author->id }}">
                                         Elimina
                                     </button>
                                 </div>
                                 <!-- Button trigger modal -->


                                 <!-- Modal -->
                                 <div class="modal fade" id="author-{{ $author->id }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                     <form action="{{ route('authors.destroy', ['author' => $author]) }}" method="POST"
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
                                                 Sat per eliminare l'autore: {{ $author->name }}

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
         </div>
     </div>
 </x-layout>
