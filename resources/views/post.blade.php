<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <article class="py-6 max-w-screen-md border-b border-b-green-300">
      <h2 class="mb-2 text-3xl tracking-tight font-bold text-blue-800">{{ $post['title'] }}</h2>
    <div class="text-base text-gray-400"><a href="">{{ $post['author'] }} | 11 Mei 2024</a></div>
    <p class="py-4 font-light">{{ $post['body'] }}</p>
    <a href="/posts" class="font-medium text-blue-800 hover:text-blue-400">&laquo; Back to Posts</a>
  </article>

</x-layout>