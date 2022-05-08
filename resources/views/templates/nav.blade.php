<ul class="flex justify-center mb-4">
    {{-- <li class="mx-1">
        <a href="{{ route('posts.index')}}" class="px-2 py-3 inline-block hover:text-sky-600 hover:underline">Home</a>
    </li>
    <li class="mx-1">
        <a href="{{ route('posts.create') }}" class="px-2 py-3 inline-block hover:text-sky-600 hover:underline">Create Post</a>
    </li>
    <li class="mx-1">
        <a href="{{ route('posts.trashed') }}" class="px-2 py-3 inline-block hover:text-sky-600 hover:underline">Trash</a>
    </li> --}}

    @foreach ($menus as $menu)
        <li class="mx-1">
            <a href="{{ route($menu->route)}}" class="px-2 py-3 inline-block hover:text-sky-600 hover:underline">{{ $menu->title }}</a>
        </li>
    @endforeach
</ul>