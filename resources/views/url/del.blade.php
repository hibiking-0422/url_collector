@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/url/del" method="post">
    @csrf
    name :{{ $url->url }} <br>
    title :{{ $url->title }} <br>
    comment :{{ $url->comment }}<br>
    <input type="hidden" name="id" value="{{ $url->id }}">
    <input type="submit" value="send">
</form>