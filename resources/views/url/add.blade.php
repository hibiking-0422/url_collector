<!doctype html>
<html lang="ja">
<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@if (count($errors) > 0) 
    @foreach ($error->all() as $error)
        {{ $error }}
    @endforeach
@endif
<form action="/url/add" method="post">
    @csrf
    url :<input type="text" name="url" value="{{ old('url') }}"> <br>
    title :<input type="text" name="title" value="{{ old('title') }}"> <br>
    comment :<textarea rows="6" name="comment">{{ old('comment')}}</textarea><br>
    @foreach ($genres as $genre)
        <input type="checkbox" name="genres[]" value="{{ $genre->id }}">{{ $genre->genre_name }}
    @endforeach
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="submit" value="send">
</form>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>