@extends('layouts.master')
@section('title', 'Update')
@section('content')
@if (session()->has('message'))
    @include('templates.message')
@endif
<div class="block p-6 rounded-lg shadow-lg bg-white max-w-md mx-auto">
    <form action="{{ route('posts.update', $post)}}" method="POST">
        @csrf
        @method('put')
        <div class="text-center">
            <h2 class="text-2xl pb-4">Update Post</h2>
        </div>
      <div class="form-group mb-6">
        <input type="text" class="form-control block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          @error('title') border-red-500 @enderror
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
          id="title"
          name="title"
          placeholder="Title"
          value="{{ $post->title }}">
          @error('title')
              <div class="text-red-500 text-sm">
                    {{ $message }}
              </div>
          @enderror
      </div>
      <div class="form-group mb-6">
        <textarea
        class="
          form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          @error('description') border-red-500 @enderror
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
        "
        id="description"
        name="description"
        rows="3"
        placeholder="Description">{{ $post->description }}</textarea>
         @error('description')
            <div class="text-red-500 text-sm">
              {{ $message }}
            </div>
          @enderror
      </div>

      <button type="submit" class="
        w-full
        px-6
        py-2.5
        bg-blue-600
        text-white
        font-medium
        text-xs
        leading-tight
        uppercase
        rounded
        shadow-md
        hover:bg-blue-700 hover:shadow-lg
        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
        active:bg-blue-800 active:shadow-lg
        transition
        duration-150
        ease-in-out">Update</button>
    </form>
    <ul class="bg-white rounded-lg w-96 text-gray-900">
      @foreach ($post->comments as $comment)
          <li class="px-6 py-2 border-b border-gray-200 w-full rounded-t-lg">
              <h3 class="font-bold">Author: {{ $comment->author }}</h3>
              {{ $comment->comment }}
          </li>
      @endforeach
  </ul>
  </div>
@endsection