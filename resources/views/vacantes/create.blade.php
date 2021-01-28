@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

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

            <div class="mb-5">
                <label for="experiencia" class="block text-gray-700 text-sm mb-2"> Ubicaciones: </label>

                <select 
                        name="ubicacion" 
                        id="ubicacion" 
                        class="block appearance-none w-full 
                        border border-gray-200 text-gray-700 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500 
                        p-3 bg-gray-100"
                 >

                        <option disabled selected> Selecciona </option>

                        @foreach ($ubicaciones as $ubicacion)
                            <option value=" {{ $ubicacion->id}} "> {{ $ubicacion->nombre }} </option>
                        @endforeach

                </select>
            </div>

            
            <div class="mb-5">
                <label for="experiencia" class="block text-gray-700 text-sm mb-2"> Salario: </label>

                <select 
                        name="salario" 
                        id="salario" 
                        class="block appearance-none w-full 
                        border border-gray-200 text-gray-700 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500 
                        p-3 bg-gray-100"
                 >

                        <option disabled selected> Selecciona </option>

                        @foreach ($salarios as $salario)
                            <option value=" {{ $salario->id}} "> {{ $salario->nombre }} </option>
                        @endforeach

                </select>
            </div>

            <div class="mb-5">
                <label for="descripcion" class="block text-gray-700 text-sm mb-2"> Descripción: </label>

                <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700">

                </div>

                <input type="hidden" name="descripcion" id="descripcion">

            </div>


            
            <div class="mb-5">
                <label for="imagen" class="block text-gray-700 text-sm mb-2"> Imagen: </label>

                <div class="dropzone roundes bg-gray-100" id="dropzone"></div>

                <p id="error">  </p>
        
            </div>



            <button class="bg-gray-600 w-full hover:bg-gray-700 text-white-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
                    Publicar
            </button>


    </form>


@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.js" integrity="sha512-8l10HpXwk93V4i9Sm38Y1F3H4KJlarwdLndY9S5v+hSAODWMx3QcAVECA23NTMKPtDOi53VFfhIuSsBjjfNGnA==" crossorigin="anonymous"></script>

    <script>

        // Quitar error de Dropzone al inicio
        Dropzone.autoDiscover = false;
            document.addEventListener('DOMContentLoaded', () => {

                // Medium Editor
                console.log('Hello')
                let editor = new MediumEditor('.editable', {
                    toolbar: {
                        buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyCenter', 'justifyRight', 'justifyLeft', 'justifyFull', 'orderedList', 'unorderedList', 'h1', 'h2', 'h3'],
                        static: true,
                        sticky: true
                    }
                });
                console.log(editor)

                editor.subscribe('editableInput', function(eventObj, editable) {
                    console.log('Hello 2')
                    const content =  editor.getContent();
                    document.querySelector('#descripcion').value = content;
                })

                // Dropzone

                // En el headers se manda el crsf token obteniéndolo de su etiqueta meta con Javascript
                // Obligatorio en los formularios de Laravel y que Dropzone necesita
                // de manera individual
                const dropzone = new Dropzone('#dropzone', {
                    // Ruta en la que se procesara el archivo
                    url: '/vacantes/imagen',
                    // Modificar mensaje
                    dictDefaultMessage: 'Sube aquí tu archivo',
                    // Las extensiones de archivos que se aceptaran
                    acceptedFiles: ".png, .jpg, .jpeg, .gif, .bmp",
                    // Añade el botón para borrar los archivos del cuadro de Dropzone
                    addRemoveLinks: true,
                    // Nombre para el botón de la opción anterior
                    dictRemoveFile: 'Borrar archivo',
                    // Máximo de archivos que se pueden subir
                    maxFiles: 1,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    },
                    // Si se procesa bien la imagen en el servidor
                    success: function(file, response) {
                      
                        document.querySelector('#error').textContent = "";
                    },
                    // Si ocurre un error en el cliente
                    error: function(file, response) {
                    
                        document.querySelector('#error').textContent = "Formano no válido";
                    },
                    // Que hacer si se supera el número de archivos permitidos
                    maxfilesexceeded: function(file) {
                        console.log(this.files);
                        // Se confirma si el usuario a subido más archivos de los permitidos
                        // Y borra unos para poner los nuevos
                        if(this.files[1] != null) {
                            // Elimina el archivo anterior
                            this.removeFile(this.files[0]);
                            // Y agregas el nuevo archivo
                            this.addFile(file); 
                        }
                    },
                    // Muestra que archivo fue eliminado por consola
                    removedfile: function(file, response) {
                        console.log('Removed: ', file);
                    }
                })

            })

    </script>

@endsection