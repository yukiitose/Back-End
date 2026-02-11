<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->text }}</p>
    <small>Category: {{ $post->category->name ?? 'N/A' }}</small>
    <br>
    <small>Posted: {{ $post->created_at->format('M d, Y') }}</small>
    <br><br>
    <a href="{{ route('posts.index') }}">← Back to all posts</a>
</body>
</html>