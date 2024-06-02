<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-6 max-w-screen-md border-b border-b-green-300">
        <h2 class="mb-2 text-3xl tracking-tight font-bold text-blue-800">{{ $post['title'] }}</h2>
        <div>By
            <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-base text-gray-400">{{ $post->author->name }} </a>
            In
            <a href="/categories/{{ $post->category->slug }}"
              class="hover:underline text-base text-gray-400">{{ $post->category->name }} </a>
            | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="py-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-800 hover:text-blue-400">&laquo; Back to Posts</a>
    </article>

</x-layout>
