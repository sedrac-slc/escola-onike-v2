<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Horario;
use App\Models\Disciplina;
use App\Http\Controllers\Controller;
use App\Http\Requests\DisciplinaRequest;
use App\Enum\NumeroClasseEnum;

class DisciplinaController extends Controller
{
    public function index(){
        $disciplinas = Disciplina::orderBy('created_at','DESC')->paginate();
        $horarios = Horario::orderBy('created_at','DESC')->get();
        return view('pages.disciplina',[
            'disciplinas' => $disciplinas,
            'horarios' => $horarios,
            'numeroClasse' => NumeroClasseEnum::list(),
            'painel' => 'disciplina'
        ]);
    }

    public function store(DisciplinaRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Disciplina::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(DisciplinaRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $horario = Disciplina::find($id);
            $horario->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $horario = Disciplina::find($id);
            $horario->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

}
