<x-app-layout>
    {{--   todo en mayuscula font-bold negrita --}}
    <div class="mx-auto max-w-5xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold mb-6">Etiqueta:{{ $tag->name }}</h1>
        {{--  listado de post que le corresponden a lacategoria bg-hhite targeta blanca importamos el componente --}}
        @foreach ($posts as $post)
           <x-card-post :post="$post"/>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $posts->links() }}
    </div>


</x-app-layout>