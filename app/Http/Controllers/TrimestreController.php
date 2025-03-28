<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrimestreRequest;
use App\Http\Controllers\Controller;
use App\Models\Trimestre;
use App\Models\Nota;
use App\Enum\NumeroEnum;
use Exception;

class TrimestreController extends Controller
{
    public function index(){
        $trimestres = Trimestre::orderBy('created_at','DESC')->paginate();
        $numeros = NumeroEnum::list();
        return view('pages.trimestre',[
            'trimestres' => $trimestres,
            'numeros' => $numeros ,
            'painel' => 'trimestre'
        ]);
    }

    public function store(TrimestreRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Trimestre::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(TrimestreRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $trimestre = Trimestre::find($id);
            $trimestre->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $trimestre = Trimestre::find($id);
            $trimestre->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxTrimestreNota($trimestre){
        return Nota::with('aluno.user','turma','disciplina')->where('trimestre_id', $trimestre)->get();
    }
}
