<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">

        <div class="w-100" style="height: 60px; background-color: blue;">
            <h1 class="mb-4 text-center text-white">Landing Page</h1>
        </div>
          <div class="container mt-5">
          <form action="{{ url('/cliente') }}" method="POST" class="card p-4 shadow-sm bg-white">
            @csrf


            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo Documento</label>
                    <select name="tipoDocumento_id" id="tipoDocumento_id" class="form-select"   required>
                        <option value="">Seleccione una Tipo Documento</option>
                        @foreach ($tipoDoc as $T)
                            <option value="{{ $T->idTipodocumento }}">{{ $T->descripcion }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Numero Documento</label>
                    <input type="text" name="numeroDocumento" class="form-control" required>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Ciudad</label>
                    <select name="ciudadId" id="ciudadId" class="form-select" required>
                        <option value="">Seleccione una ciudad</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->idCiudad }}">{{ $ciudad->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Numero Telefono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha Creación</label>
                    <input type="date" name="fechaCreacion" class="form-control" required>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-check mt-4">
                        <input type="checkbox" name="habeasData" value="1" class="form-check-input" id="habeasData" required>
                        <label class="form-check-label" for="habeasData">
                            Acepto el tratamiento de datos personales (Habeas Data)
                        </label>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </div>
        </form>


        @if($ganador)
        <div class="alert alert-success mt-4">
            <h4 class="alert-heading"> Ganador del Sorteo</h4>
            <ul class="list-unstyled">
                <li><strong>Nombre:</strong> {{ $ganador->nombre }} {{ $ganador->apellido }}</li>
                <li><strong>Correo:</strong> <a href="mailto:{{ $ganador->correo }}">{{ $ganador->correo }}</a></li>
            </ul>
        </div>
    @else
        <div class="alert alert-warning mt-4">
            Aún no hay suficientes participantes para seleccionar un ganador.
        </div>
    @endif



    <div class="mt-4">
        <form action="{{ route('clientes.exportar') }}" method="GET" class="d-inline-block me-2">
            <button type="submit" class="btn btn-success">
                <i class="bi bi-file-earmark-excel"></i> Clientes a Excel
            </button>
        </form>

        <form action="{{ route('clientes.exportargan') }}" method="GET" class="d-inline-block">
            <button type="submit" class="btn btn-info">
                <i class="bi bi-file-earmark-excel"></i> Ganadores a Excel
            </button>
        </form>
    </div>



          </div>
          <footer class="bg-dark text-white py-3 mt-4">
            <div class="container">
                <div class="row">
                    <!-- Columna izquierda -->
                    <div class="col-md-6 text-left">
                        <p><strong>Nombre:</strong> Guiovanny Anatoli Caro Daza</p><p> <strong>Cédula:</strong> 79848026</p><p><strong> Celular:</strong> 3160405672</p>
                        <p> <strong>Correo:</strong>  guiovanny.caro@outlook.com</p>
                    </div>
                    <!-- Columna derecha -->
                    <div class="col-md-6 text-right">
                        <p>&copy; 2025 Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
