@extends('layouts.master')
@section('title', 'Trash')
@section('content')
@if (session()->has('message'))
    @include('templates.message')
@endif
    <div class="grid grid-cols-3 gap-5 mx-auto">
        @forelse ($posts as $post)
        <div class="rounded-lg shadow-lg bg-white max-w-sm">
            <img class="rounded-t-lg" src="../images/poster/{{ $post->image}}" alt=""/>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $post->title }}</h5>
                <p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>
                <p class="text-gray-700 text-base mb-4">{{ $post->created_at }}</p>
                <div class="flex justify-between">
                    <form action="{{ route('posts.trashed.restore', $post) }}" method="post" onsubmit="return confirm('Are you sure you want to restore this post?')">
                        @csrf
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-green-600
                                        text-white font-medium text-xs leading-tight
                                        uppercase rounded shadow-md hover:bg-green-700
                                        hover:shadow-lg focus:bg-green-700 focus:shadow-lg
                                        focus:outline-none focus:ring-0 active:bg-green-800
                                        active:shadow-lg transition duration-150
                                        ease-in-out">Restore</button>
                    </form>
                    <form action="{{ route('posts.trashed.destroy', $post) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        <button type="submit"
                                class="inline-block px-6 py-2.5 bg-red-600
                                        text-white font-medium text-xs leading-tight
                                        uppercase rounded shadow-md hover:bg-red-700
                                        hover:shadow-lg focus:bg-red-700 focus:shadow-lg
                                        focus:outline-none focus:ring-0 active:bg-red-800
                                        active:shadow-lg transition duration-150
                                        ease-in-out">Force Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
            <h2 class="text-2xl">No post yet.</h2>
        @endforelse
    </div>
@endsection