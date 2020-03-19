@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/genre/edit" method="post">
    @csrf
    genre: <input type="text" name="genre_name" value='{{ $genre->genre_name }}'>
    <input type="hidden" name="id" value="{{ $genre->id }}">
    <input type="submit" value="send">
</form>