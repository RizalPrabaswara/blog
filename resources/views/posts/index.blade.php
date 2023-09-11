<x-layout>
    @include('layouts.header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />

            {{-- pagination --}}
            {{ $posts->links() }}
        @else
            <p class="text-center">No Post Found</p>
        @endif

    </main>

    {{-- @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

            <p>
                Written By
                <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a>
                In <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>

            <h3>{{ $post->slug }}</h3>
            <h3>{{ $post->created_at }}</h3>
            <br>
            <p>{!! $post->body !!}</p>
        </article>
    @endforeach --}}
</x-layout>

{{-- @extends('layout')

@section('banner')
    <h1>My Blog</h1>
@endsection

@section('content')
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>
            <h3>{{ $post->excerpt }}</h3>
            <h3>{{ $post->date }}</h3>
            <br>
            <p>{!! $post->body !!}</p>
        </article>
    @endforeach
@endsection --}}
