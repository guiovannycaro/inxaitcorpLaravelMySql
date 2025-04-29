<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facade\Redirect;
use Maatwebsite\Excel\Facades\Excel;


use App\Models\Clientes;
use App\Models\Ganador;
use App\Http\Request\ClienteFormRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ClienteController extends Controller
{
    public function __construct(){

    }


    public function index()
    {
        $clientes = DB::select('SELECT * FROM clientes');
        $ciudades = DB::select('SELECT * FROM ciudad');
        $tipoDoc = DB::select('SELECT * FROM tipodocumento');

        $hoy = now()->toDateString();
        $ganadorExistente = Ganador::whereDate('fecha_ganado', $hoy)->first();


            $ganador = null;
            if (count($clientes) >= 5) {
                $ganador = $clientes[array_rand($clientes)];



                Ganador::create([
                    'cliente_id' => $ganador->idCliente,
                    'fecha_ganado' => now(),
                ]);

        }

        return view("inxait.clientes.index", [
            "clientes" => $clientes,
            "ciudades" => $ciudades,
            "tipoDoc" => $tipoDoc,
            "ganador" => $ganador
        ]);
    }


    public function exportarClientes(){


        $clientes = DB::select("
         SELECT
            clientes.nombre,
            clientes.apellido,
            tipodocumento.descripcion AS tipo_documento,
            clientes.numeroDocumento,
            ciudad.nombre AS ciudad,
            clientes.telefono,
            clientes.correo,
            clientes.fechaCreacion,
            clientes.habeasData
        FROM clientes
            JOIN tipodocumento ON clientes.tipoDocumento_id = tipodocumento.idTipodocumento
           JOIN ciudad ON clientes.ciudadId = ciudad.idCiudad
    ");


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray(['Nombre', 'Apellido', 'Tipo Documento', 'Numero Documento', 'Ciudad','telefono','correo','Fecha Creacion','Habeas Data'], NULL, 'A1');

    $row = 2;
    foreach ($clientes as $cliente) {
        $sheet->fromArray([
            $cliente->nombre,
            $cliente->apellido,
            $cliente->tipo_documento,
            $cliente->numeroDocumento,
            $cliente->ciudad,
            $cliente->telefono,
            $cliente->correo,
            $cliente->fechaCreacion,
            $cliente->habeasData
        ], NULL, 'A' . $row);
        $row++;
    }


    $writer = new Xlsx($spreadsheet);
    $filename = 'clientes.xlsx';


    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $writer->save('php://output');
    exit;



    }


    public function exportarClientesGanador(){


    $clientes = DB::select("
    select
       clientes.nombre,
       clientes.apellido,
       tipodocumento.descripcion AS tipo_documento,
       clientes.numeroDocumento,
       ciudad.nombre AS ciudad,
       clientes.telefono,
       clientes.correo,
       clientes.fechaCreacion,
       clientes.habeasData
     from ganadores join clientes on ganadores.cliente_id = clientes.idCliente
       join tipodocumento on clientes.tipoDocumento_id = tipodocumento.idTipodocumento
       join ciudad on clientes.ciudadId = ciudad.idCiudad");


    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray(['Nombre', 'Apellido', 'Tipo Documento', 'Numero Documento', 'Ciudad','telefono','correo','Fecha Creacion','Habeas Data'], NULL, 'A1');

    $row = 2;
    foreach ($clientes as $cliente) {
        $sheet->fromArray([
            $cliente->nombre,
            $cliente->apellido,
            $cliente->tipo_documento,
            $cliente->numeroDocumento,
            $cliente->ciudad,
            $cliente->telefono,
            $cliente->correo,
            $cliente->fechaCreacion,
            $cliente->habeasData
        ], NULL, 'A' . $row);
        $row++;
    }


    $writer = new Xlsx($spreadsheet);
    $filename = 'ganadores.xlsx';


    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $writer->save('php://output');
    exit;



    }

    public function create(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipoDocumento_id' => 'required|string|max:10',
            'numeroDocumento' => 'required|string|max:50',
            'ciudadId' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
            'fechaCreacion' => 'required|date',
            'habeasData' => 'required|boolean',
        ]);

        // Consulta SQL
      $clien =  DB::insert('INSERT INTO clientes (nombre, apellido, tipoDocumento_id, numeroDocumento, ciudadId, telefono, correo, fechaCreacion, habeasData, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())', [
            $validated['nombre'],
            $validated['apellido'],
            $validated['tipoDocumento_id'],
            $validated['numeroDocumento'],
            $validated['ciudadId'],
            $validated['telefono'],
            $validated['correo'],
            $validated['fechaCreacion'],
            $validated['habeasData']
        ]);


        return redirect('/cliente')->with('success', 'Cliente creado correctamente');
    }

    public function downloadExcel(){

    }

    public function store(ClienteFormRequest $request, $id)
{

}

    public function show(string $codnifrfc){


    }


    public function update(string $codnifrfc){


    }

public function delete(int $id)
{

}

}
