<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  @foreach ($posts as $post)
  <article class="py-6 max-w-screen-md border-b border-b-green-300">
    <a href="posts/{{ $post['slug'] }}" class="hover:underline">
      <h2 class="mb-2 text-3xl tracking-tight font-bold text-blue-800">{{ $post['title'] }}</h2>
    </a>
    <div class="text-base text-gray-400"><a href="">{{ $post['author'] }} | 11 Mei 2024</a></div>
    <p class="py-4 font-light">{{ Str::limit($post['body'], 100) }}</p>
    <a href="posts/{{ $post['slug'] }}" class="font-medium text-blue-800 hover:text-blue-400">Read More &raquo;</a>
  </article>
  @endforeach
</x-layout>