<x-layout>
    Nome Libro:{{ $book->name }} <br>
    ANno di uscita: {{ $book->year }}<br>
    Numero Pagine: {{ $book->page }}<br>
    <hr>
    Autore: @if (isset($book->author->firstname))
        {{ $book->author->firstname }} {{ $book->author->lastname }}<br>
    @else
        Sconociuto<br>
    @endif

    <hr>
    <ul>
        @foreach ($book->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</x-layout>
