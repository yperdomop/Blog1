 @props(['post']) {{--  importar el componente card-post  --}}

 {{--  clase shadow sobresalga la targeta en blanco  --}}
 <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
     @if ($post->image)
         <img class="w-full h-72 object-cover object-center " src="{{ Storage::url($post->image->url) }}" alt="">
     @else
         <img class="w-full h-72 object-cover object-center "
             src="https://cdn.pixabay.com/photo/2024/01/19/19/46/ai-generated-8519696_1280.jpg" alt="">
     @endif

     <div class="px-6 py-4">
         <h1 class="font-bold text-xl mb-2 "><a href="{{ route('posts.show', $post) }}">
                 {{ $post->name }}</a></h1>
         {{--  extracto del post  --}}
         <div class="text-gray-700 text-base">
             {{-- para que no me aparezca las etiquetas de keditor colocar una llave y colocar signo de exclamación --}}
             {!! $post->extract !!}
         </div>

     </div>
     <div class="px-6 pt-4 pb-2">
         @foreach ($post->tags as $tag)
             <a href="{{ route('posts.tag', $tag) }}"
                 class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2">{{ $tag->name }}</a>
         @endforeach

     </div>


 </article>
