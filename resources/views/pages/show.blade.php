@extends('layouts.master')
@section('title', 'Show')
@section('content')
    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-[550px] m-auto">
        <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $post->title }}</h5>
        <p class="text-gray-700 text-base mb-4">{{ $post->description }}</p>
        <p class="text-gray-700 text-base mb-4">{{ $post->created_at }}</p>
        <div class="flex justify-between">
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
            <form action="{{ route('posts.destroy', $post) }}" method="post">
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
@endsection