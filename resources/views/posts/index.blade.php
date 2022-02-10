@extends('layouts.template')
@section('title','Index')

@section('content')
<h1 class="text-center">{{__('Posts')}}</h1>

<div class="container">
    <table class="table table-dark">
        <thead>
            <p>{{__('Welcome')}}! {{Auth::user()->name}} {{__('you have the role of')}} {{Auth::user()->user_role}}.</p>
            <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">{{__('Titulo')}}</th>
                <th scope="col">{{__('Extracto')}}</th>
                <th scope="col">{{__('Contenido')}}</th>
                <th scope="col">{{__('Caducable')}}</th>
                <th scope="col">{{__('Comentable')}}</th>
                <th scope="col">{{__('Acceso')}}</th>
                <th>
                    @can('create', $posts)
                        <button class="btn btn-primary"><a class="text-white" href="{{route('posts.create', app()->getLocale())}}">@lang('Add')</a></button>
                    @endcan
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach($posts as $post)
            <tr class="text-center">
                <td>{{ $post->id}}</td>
                <td>{{ $post->titulo}}</td>
                <td>{{ $post->extracto}}</td>
                <td>{{ $post->contenido}}</td>
                <td>{{ $post->caducable == true ? 'Si' : 'No' }} </td>
                <td>{{ $post->comentable == true ? 'Si' : 'No' }}</td>
                <td>{{ $post->acceso}}</td>
                <td>
                    @can('update', $post)
                        <a href="{{route('posts.edit', [ 'post' => $post->id, 'locale' => app()->getLocale()])}}"><button class="btn btn-primary">@lang('Edit')</button></a>
                    @endcan

                    @can('delete', $post)
                        <button class="btn btn-danger"><a class="text-white" href="{{route('posts.show', [ 'post' => $post->id, 'locale' => app()->getLocale()])}}">@lang('Delete')</a></button>
                    @endcan

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
