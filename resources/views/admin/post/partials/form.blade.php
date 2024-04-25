<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del posts']) !!}
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categories, null, [
        'class' => 'form-control',
        'placeholder' => 'Seleccione la categoría',
    ]) !!}
    @error('category_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Etiquetas</p>
    @foreach ($tags as $tag)
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{ $tag->name }}

        </label>
    @endforeach

    @error('tags')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Publicado
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
{{--  creamos una grid con dos columnas y mb-3 separar el div  --}}
<div class="row mb-3">
    <div class="col">
        {{--  colocamos una img si el usuario no coloca nada  --}}
        <div class="image-wrapper">
            {{--  isset verifica si esta definido post-image  --}}
            @isset($post->image)
                <img id="picture" src="{{ Storage::url($post->image->url) }}">
            @else
                <img id="picture" src="https://cdn.pixabay.com/photo/2024/01/19/19/46/ai-generated-8519696_1280.jpg">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">

            {!! Form::label('file', 'Imagen que se mostrará en el post') !!}

            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora facilis assumenda doloremque eius
        nulla aspernatur doloribus alias dolorum quaerat a. Quibusdam enim corrupti culpa? Accusamus excepturi
        corporis nostrum nemo iusto!
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto') !!}
    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('body', 'Cuerpo del post') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
