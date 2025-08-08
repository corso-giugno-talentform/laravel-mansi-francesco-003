  <div class="container mt-5">
      @if (session('success'))
          <x-alert color="alert-success"> {{ session('success') }}</x-alert>
      @endif
      <div class="align-middle gap-2 d-flex justify-content-between">
          <h3>Elenco Tag inseriti</h3>

          <a href="{{ route('tags.create') }}" type="button" class="btn btn btn-success me-md-2">
              Crea Nuovo Tag
          </a>
      </div>
      <table class="table border mt-2">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col"></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($tags as $tag)
                  <tr>
                      <th scope="row">#{{ $tag->id }}</th>
                      <td>{{ $tag->name }}</td>
                      <td>

                          <div class="d-grid gap-2 d-md-flex justify-content-md-end">


                              <a href="{{ route('tags.edit', ['tag' => $tag]) }}" class="btn btn-warning me-md-2">
                                  Modifica
                              </a>

                              <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                  data-bs-target="#tag-{{ $tag->id }}">
                                  Elimina
                              </button>
                          </div>
                          <!-- Button trigger modal -->


                          <!-- Modal -->
                          <div class="modal fade" id="tag-{{ $tag->id }}" tabindex="-1"
                              aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <form class="modal-dialog">

                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Attento! Operazione
                                              non Reversibile!</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                              aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          Sat per eliminare il tag: {{ $tag->name }}

                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                              data-bs-dismiss="modal">Close</button>
                                          <button wire:click="delete('{{ $tag->id }}')" type="button"
                                              class="btn btn-danger">SI,
                                              Elimina</button>
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
