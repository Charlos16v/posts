@extends('layouts.template')
@section('title','Editar')

@section('content')
<h2 class="text-center">{{__('Edit')}} {{__('Post')}}</h2>
<div class="continer d-flex justify-content-center">
    <form class="form border border-secondary text-start bg-light m-2 w-75"
        action="{{route('posts.update', ['post' => $post, 'locale' => app()->getLocale()])}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            @foreach ($errors->all() as $error)
            <ul>
                <li class="text-danger">
                    {{ $error }}
                </li>
            </ul>
            <br />
            @endforeach
            <div>

                <div class="form-group m-2">
                    <label>@lang('Titulo')<br> <input class="form-control" type="text" name="titulo"
                            value="{{ old('titulo'), $post->titulo}}" required></label>
                    @error('titulo')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Extracto')<br> <input class="form-control" type="text" name="extracto"
                            value="{{ old('extracto'), $post->extracto}}" required></label>
                    @error('extracto')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Contenido')<br> <input class="form-control" type="text" name="contenido"
                            value="{{ old('contenido'), $post->contenido}}" required></label>
                    @error('contenido')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>


                <div class="form-group m-2">
                    <label>@lang('Caducable'):</label>

                    <input type="checkbox" name="caducable" {{ old('caducable')==='true' ? 'checked=' .'"checked"' : ''
                        }}>

                    @error('caducable')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Comentable'):</label>

                    <input type="checkbox" name="comentable" {{ old('comentable')==='true' ? 'checked=' .'"checked"'
                        : '' }}>

                    @error('comentable')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Acceso'):</label>

                    <select id="acceso" name="acceso">
                        <option value="publico">Publico</option>
                        <option value="privado">Privado</option>
                    </select>

                    @error('acceso')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{ Auth::user()->id}}">
                <button type="submit" class="btn btn-success p-1 m-2">@lang('Edit')</button>
                <button class="btn btn-danger p-1 mb-2"><a class="text-white" href="{{route('posts.show', ['locale' => app()->getLocale(), 'post' => $post->id])}}">Delete post</a></button>
    </form>
</div>
@endsection
