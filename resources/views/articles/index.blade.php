@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-end my-3">
                <a href="{{ route('articles.create') }}" class="btn btn-success">Post new article</a>
            </div>

            @foreach ($articles as $article)
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                        <span>{{ $article->author->name }}</span>
                    </div>

                    <div class="card-body">
                        {{ $article->content }}
                    </div>

                    <div class="card-footer">
                        {{ $article->tag }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
