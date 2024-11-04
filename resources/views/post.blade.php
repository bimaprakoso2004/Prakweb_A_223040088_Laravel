<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Welcome To My Blog!</h3>
  
    <article class="py-8 max-w-screen-md border-b border-gray-300">
      @if($post)
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
          <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
  
        <div class="text-base text-gray-500">
          <a href="#">{{ $post['author'] }}</a> | 16 Oct 2024
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
      @else
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">Holaaa</h2>
        <p class="my-4 font-light">The requested post does not exist.</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
      @endif
    </article>
  </x-layout>