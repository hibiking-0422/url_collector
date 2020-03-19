@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/genre/add" method="post">
    @csrf
    genre: <input type="text" name="genre_name" value='{{ old('genre_name') }}'>
    <input type="submit" value="send">
</form>