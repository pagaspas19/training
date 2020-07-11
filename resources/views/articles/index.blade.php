@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-end my-3">
                <a href="{{ route('articles.create') }}" class="btn btn-success">Post new article</a>
            </div>

            @foreach ($articles as $article)
            <form method="POST" action="{{ route('articles.update', $article->id) }}">
                {{csrf_field()}}
                {{ method_field('PATCH')}}
                @csrf

                <div class="card mb-3">
                    {{-- <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary">VIEW</a> --}}
                    <div class="card-header d-flex justify-content-between">
                        <div class="">
                            {{-- @can('update', $article)
                                <label for="title">Title</label>
                                <input type="text" id="title" value="{{ $article->title }}">
                            @endcan
                            
                            @cannot('update', $article) --}}
                                <span>{{ $article->title }}</span>
                            {{-- @endcannot --}}
                        </div>
                        <span>{{ $article->author->name }}</span>
                    </div>
                    
                    <div class="card-body">
                        {{-- @can('update', $article)
                            <label for="title">Content</label> 
                            <input type="text" id="title" value="{{ $article->content }}">
                        @endcan
    
                        @cannot('update', $article) --}}
                            {{ $article->content }}
                        {{-- @endcannot --}}
                    </div>

                    <div class="card-footer d-flex ">
                        @can('update', $article)
                            <label for="tag" class=" px-2">Tag</label>
                            <div class="col-6">
                                <select name="tag" id="tag" class="form-control" value="{{ $article->tag }}">
                                    {{-- <option value="" disabled selected>Select a tag</option> --}}
                                    <option value="Food">Food</option>
                                    <option value="Travel">Travel</option>
                                    <option value="Technology">Technology</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Sumit</button>
                        @endcan
    
                        @cannot('update', $article)
                            <label for="tag">Tag</label>
                            {{ $article->tag }}
                        @endcannot
                       
                    </div>
                </div>
            </form>
            @endforeach

        </div>
    </div>
</div>
@endsection
