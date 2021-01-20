@extends('layouts.app')

@section('navegacion')

   @include('partials.adminnav')

@endsection

@section('content')
    
    <h1 class="text-2xl text-center mt-10"> Crear un nuevo empleo </h1>


    <form class="max-w-lg mx-auto my-10" action="">

            <div class="mb-5">
                <label for="titulo" class="block text-gray-700 text-sm mb-2"> Título de empleo: </label>
                <input id="titulo" type="text" class="p-3 bg-gray-300 rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" autocomplete="titulo" autofocus>

                @error('titulo')
                    <span class="bg-red-100 border-l-4 border-red-500 text-sm text-red-500 p-2 w-full mt-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-5">
                <label for="categoria" class="block text-gray-700 text-sm mb-2"> Categorias: </label>

                <select 
                        name="categoria" 
                        id="categoria" 
                        class="block appearance-none w-full 
                        border border-gray-200 text-gray-700 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500 
                        p-3 bg-gray-100"
                 >

                        <option disabled selected> Selecciona </option>

                        @foreach ($categorias as $categoria)
                            <option value=" {{ $categoria->id}} "> {{ $categoria->nombre }} </option>
                        @endforeach

                </select>
            </div>

            <div class="mb-5">
                <label for="experiencia" class="block text-gray-700 text-sm mb-2"> Categorias: </label>

                <select 
                        name="experiencia" 
                        id="experiencia" 
                        class="block appearance-none w-full 
                        border border-gray-200 text-gray-700 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500 
                        p-3 bg-gray-100"
                 >

                        <option disabled selected> Selecciona </option>

                        @foreach ($experiencias as $experiencia)
                            <option value=" {{ $experiencia->id}} "> {{ $experiencia->nombre }} </option>
                        @endforeach

                </select>
            </div>

            <button class="bg-gray-600 w-full hover:bg-gray-700 text-white-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
                    Publicar
            </button>


    </form>


@endsection