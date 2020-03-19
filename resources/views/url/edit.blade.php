@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/url/edit" method="post">
    @csrf
    name :<input type="text" name="url" value="{{ $url->url }}"> <br>
    title :<input type="text" name="title" value="{{ $url->title }}"> <br>
    comment :<textarea rows="6" name="comment">{{ $url->comment }}</textarea>
    <input type="hidden" name="id" value="{{ $url->id }}">
    <input type="hidden" name="user_id" value="{{ $url->user_id }}">
    <input type="submit" value="send">
</form>