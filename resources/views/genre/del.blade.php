@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/genre/del" method="post">
    @csrf
    genre :{{ $genre->genre_name }} <br>
    <input type="hidden" name="id" value="{{ $genre->id }}">
    <input type="submit" value="send">
</form>