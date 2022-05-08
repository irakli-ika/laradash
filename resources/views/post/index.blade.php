@extends('layouts.master')
@section('title', 'Home')
@section('content')
@if (session()->has('message'))
    @include('templates.message')
@endif
    <div class="grid grid-cols-3 gap-5 mx-auto">
        @forelse ($posts as $post)
        <div class="rounded-lg shadow-lg bg-white max-w-sm">
            <img class="rounded-t-lg" src="images/poster/{{ $post->image}}" alt=""/>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $post->title }}</h5>
                <p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>
                <p class="text-gray-700 text-base mb-4">{{ $post->created_at }}</p>
                <div class="flex justify-between">
                    <div>
                        <a href="{{ route('posts.show', $post) }}"
                            class="inline-block px-6 py-2.5 bg-sky-600
                                    text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-sky-700
                                    hover:shadow-lg focus:bg-sky-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-sky-800
                                    active:shadow-lg transition duration-150
                                    ease-in-out">More</a>
                    </div>
                    <div>
                        <a href="{{ route('posts.edit', $post) }}"
                            class="inline-block px-6 py-2.5 bg-yellow-600
                                    text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-yellow-700
                                    hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-yellow-800
                                    active:shadow-lg transition duration-150
                                    ease-in-out">Edit</a>
                    </div>
                    <form action="{{ route('posts.destroy', $post) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-red-600
                                        text-white font-medium text-xs leading-tight
                                        uppercase rounded shadow-md hover:bg-red-700
                                        hover:shadow-lg focus:bg-red-700 focus:shadow-lg
                                        focus:outline-none focus:ring-0 active:bg-red-800
                                        active:shadow-lg transition duration-150
                                        ease-in-out">Delete</button>
                    </form>
                </div>
            </div>
            <ul class="bg-white rounded-lg w-96 text-gray-900">
                @foreach ($post->comments as $comment)
                    <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
                        <h3 class="font-bold">Author: {{ $comment->author }}</h3>
                        {{ $comment->comment }}
                    </li>
                @endforeach
            </ul>
        </div>
        @empty
            <h2 class="text-2xl">No post yet.</h2>
        @endforelse
        {{-- @if (count($posts) == 0)
            <h2 class="text-2xl">No post yet.</h2>
        @endif
        @foreach ($posts as $post)
            <div class="block p-6 rounded-lg shadow-lg bg-white">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $post->title }}</h5>
                <p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>
                <p class="text-gray-700 text-base mb-4">{{ $post->created_at }}</p>
                <div class="flex justify-between">
                    <div>
                        <a href="{{ route('posts.show', $post) }}"
                            class="inline-block px-6 py-2.5 bg-sky-600
                                    text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-sky-700
                                    hover:shadow-lg focus:bg-sky-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-sky-800
                                    active:shadow-lg transition duration-150
                                    ease-in-out">More</a>
                    </div>
                    <div>
                        <a href="{{ route('posts.edit', $post) }}"
                            class="inline-block px-6 py-2.5 bg-yellow-600
                                    text-white font-medium text-xs leading-tight
                                    uppercase rounded shadow-md hover:bg-yellow-700
                                    hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg
                                    focus:outline-none focus:ring-0 active:bg-yellow-800
                                    active:shadow-lg transition duration-150
                                    ease-in-out">Edit</a>
                    </div>
                    <form action="{{ route('posts.destroy', $post) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('delete')
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-red-600
                                        text-white font-medium text-xs leading-tight
                                        uppercase rounded shadow-md hover:bg-red-700
                                        hover:shadow-lg focus:bg-red-700 focus:shadow-lg
                                        focus:outline-none focus:ring-0 active:bg-red-800
                                        active:shadow-lg transition duration-150
                                        ease-in-out">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach --}}
    </div>
@endsection