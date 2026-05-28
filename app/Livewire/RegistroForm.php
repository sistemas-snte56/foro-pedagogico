<?php

namespace App\Livewire;

use App\Models\Delegacion;
use App\Models\Mesa;
use App\Models\Participante;
use App\Models\Region;
use Livewire\Component;

class RegistroForm extends Component
{

    public $apellido_paterno = '';
    public $apellido_materno = '';
    public $nombre = '';
    public $genero = '';
    public $nivel = '';

    public $delegacion = '';
    public $clave_centro_trabajo = '';
    public $rfc = '';
    public $numero_personal = '';

    public $regiones = [];  
    public $delegaciones = [];  

    public $selectIdRegion = null;
    public $selectIdDelegacion = null;

    public $mesaAsignada = null;
    public $registroExitoso = false;

    public $mesas = [];
    public $mesaId = null;




    public function mount()
    {
        $this->regiones = Region::orderBy('id')->get();
         $this->mesas = Mesa::all();
    }


    public function updatedSelectIdRegion($value)
    {
        // Resetear delegación seleccionada
        $this->selectIdDelegacion = null;
        // Cargar delegacines de la región
        $this->delegaciones = Delegacion::where('region_id', $value)->orderBy('delegacion')->get();
    }

    protected $rules = [
        'apellido_paterno'     => 'required|string|max:100',
        'apellido_materno'     => 'required|string|max:100',
        'nombre'               => 'required|string|max:100',
        'genero'               => 'required|in:H,M,O',
        'nivel'                => 'required|in:preescolar,primaria,secundaria',
        'selectIdDelegacion'   => 'required|string|max:100',
        'clave_centro_trabajo' => 'required|string|max:50',
        'rfc'                  => 'required|string|size:13',
        'numero_personal'      => 'required|numeric',
    ];

    protected $messages = [
        'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
        'apellido_materno.required' => 'El apellido materno es obligatorio.',
        'nombre.required' => 'El nombre es obligatorio.',
        'genero.required' => 'El género es obligatorio.',
        'nivel.required' => 'El nivel educativo es obligatorio.',
        'selectIdDelegacion.required' => 'La delegación es obligatoria.',
        'clave_centro_trabajo.required' => 'La clave del centro de trabajo es obligatoria.',
        'rfc.required' => 'El RFC es obligatorio.',
        'rfc.size' => 'El RFC debe tener exactamente 13 caracteres.',
        'numero_personal.required' => 'El número de personal es obligatorio.',
        'numero_personal.numeric' => 'El número de personal debe ser un número.',

    ];

    public function submit()
    {
        $this->validate();

        // dd(
        //     $this->apellido_paterno, 
        //     $this->apellido_materno, 
        //     $this->nombre, 
        //     $this->genero, 
        //     $this->nivel, 
        //     $this->selectIdDelegacion, 
        //     $this->clave_centro_trabajo, 
        //     $this->rfc, 
        //     $this->numero_personal);


        // Buscar mesa disponible del nivel seleccionado
        $mesa = Mesa::where('nivel_educativo', $this->nivel)
            ->whereColumn('ocupados', '<', 'capacidad')
            ->orderBy('numero')
            ->lockForUpdate()
            ->first();

        // dd( "Mesa asignada: " . $mesa->numero,
        //     "Nivel: " . $this->nivel,
        //     );

        if (!$mesa) {
            $this->addError('nivel', 'No hay mesas disponibles para este nivel.');
            return;
        }

        // Crear registro y actualizar mesa
        $registro = Participante::create([
            'apellido_paterno'     =>  mb_strtoupper(trim($this->apellido_paterno), 'UTF-8'),
            'apellido_materno'     =>  mb_strtoupper(trim($this->apellido_materno), 'UTF-8'),
            'nombre'               =>  mb_strtoupper(trim($this->nombre), 'UTF-8'),
            'genero'               => $this->genero,
            'nivel'                => $this->nivel,
            'delegacion_id'        => $this->selectIdDelegacion,
            'clave_centro_trabajo' =>  mb_strtoupper(trim($this->clave_centro_trabajo), 'UTF-8'),
            'rfc'                  =>  mb_strtoupper(trim($this->rfc), 'UTF-8'),
            'numero_personal'      => $this->numero_personal,
            'mesa_id'              => $mesa->id,
        ]);

        $mesa->increment('ocupados');

        $this->mesaAsignada = $mesa->numero;
        $this->registroExitoso = true;
        $this->reset([
            'apellido_paterno','apellido_materno','nombre','genero', 'nivel',
            'selectIdDelegacion','clave_centro_trabajo','rfc','numero_personal'
        ]);        
    }


    public function render()
    {
        return view('livewire.registro-form')->layout('layouts.app');
    }
}
