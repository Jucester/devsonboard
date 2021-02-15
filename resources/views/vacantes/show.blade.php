@extends('layouts.app')

@section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
@endsection

@section('navegacion')

   @include('partials.adminnav')

@endsection

@section('content')

    <h1 class="text-3xl text-center mt-10"> {{ $vacante->titulo }} </h1>

    <div class="mt-10 mb-20 md:flex items-start"> 
        <div class="md:w-3/5"> 
           
            <p class="block text-gray-700 font-bold my-2">
                Publicado: <span class="font-normal"> {{ $vacante->created_at->diffForHumans() }} </span>
                por: <span class="font-normal"> {{ $vacante->user->name }} </span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Categoria: <span class="font-normal"> {{ $vacante->categoria->nombre }} </span>
            </p>

            
            <p class="block text-gray-700 font-bold my-2">
                Salario: <span class="font-normal"> {{ $vacante->salario->nombre }} </span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Ubicación: <span class="font-normal"> {{ $vacante->ubicacion->nombre }} </span>
            </p>

            <p class="block text-gray-700 font-bold my-2">
                Experiencia: <span class="font-normal"> {{ $vacante->experiencia->nombre }} </span>
            </p>


            <h2 class="text-2xl mt-10 text-gray-700 mb-4"> Conocimientos: </h2>
            @php 
                $arraySkills = explode(",", $vacante->skills)
            @endphp

            @foreach ($arraySkills as $skill)
                <p class="inline-block border border-gray-600 py-2 px-8 font-bold text-gray-800">
                    {{ $skill }} 
                </p>
            @endforeach
            
            <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title={{ $vacante->titulo }}>
                <img src="/storage/vacantes/{{ $vacante->imagen }}" alt="{{ $vacante->titulo }}" class="w-40 mt-10">
            </a>
         

            <div class="descripcion mt-10 mb-5">
                {!! $vacante->descripcion !!}
            </div>
        
        </div>

        <div class="md:w-2/5"> 2 </div>
    </div>

@endsection