<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Turma;
use App\Models\Horario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HorarioRequest;

class HorarioController extends Controller
{
    public function index(){
        $horarios = Horario::orderBy('created_at','DESC')->paginate();
        return view('pages.horario',[
            'horarios' => $horarios,
            'painel' => 'horario'
        ]);
    }

    public function store(HorarioRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Horario::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(HorarioRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $horario = Horario::find($id);
            $horario->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $horario = Horario::find($id);
            $horario->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

}
