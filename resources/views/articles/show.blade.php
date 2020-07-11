@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-end my-3">
                <a href="{{ route('articles.create') }}" class="btn btn-success">Post new article</a>
                <a href="{{ route('articles.index') }}" class="btn btn-success mx-3">Article List</a>
            </div>
            <h4>View Article</h4>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ $article->title }}</span>
                    <span>{{ $article->author->name }}</span>
                </div>

                <div class="card-body">
                    {{ $article->content }}
                </div>

                <div class="card-footer">
                    {{ $article->tag }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
