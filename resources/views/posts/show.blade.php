@extends('layouts.template')
@section('title','Eliminar')

@section('content')
<h2 class="text-center">{{__('Delete')}} {{__('Post')}}</h2>
<div class="continer d-flex justify-content-center">
    <form class="form border border-secondary text-start bg-light m-2 w-75" action="{{route('posts.destroy',['post' => $post, 'locale' => app()->getLocale()])}}" method="post">
        @csrf
        @method('delete')
        <div class="container m-2">
            <ul>
                <li>ID: {{ old('name',$post->id)}}</p></li>
                <li>{{__('Titulo')}}: {{ old('name',$post->titulo)}}</p></li>
                <li>{{__('Extracto')}}: {{ old('name',$post->extracto)}}</p></li>
                <li>{{__('Contenido')}}: {{ old('name',$post->contenido)}}</p></li>
                <li>{{__('Caducable')}}: {{ old('name',$post->caducable)}}</p></li>
                <li>{{__('Comentable')}}: {{ old('name',$post->comentable)}}</p></li>
                <li>{{__('Acceso')}}: {{ old('name',$post->acceso)}}</p></li>
            </ul>
            <p>
        </div>
        <button type="submit" class="btn btn-danger p-1 mb-2">@lang('Delete')</button>
    </form>
</div>
@endsection
