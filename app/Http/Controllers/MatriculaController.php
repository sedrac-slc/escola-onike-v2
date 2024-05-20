<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use App\Models\Turma;
use Exception;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function matricula(Request $request){
        try{
            if(isset($request->aluno_id, $request->turma_id)){
                $data = $request->all();
                $data['created_by'] = $data['updated_by'] = auth()->user()->id;
                $data['created_at'] = $data['updated_at'] = now();
                Matricula::updateOrCreate(['turma_id' => $data['turma_id'], 'aluno_id' => $data['aluno_id']],$data);
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function remove(Request $request){
        try{
            if(isset($request->aluno_id, $request->turma_id)){
                $data = $request->all();
                $matricula = Matricula::where(['turma_id' => $data['turma_id'], 'aluno_id' => $data['aluno_id']])->first();
                $matricula->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxTurma($aluno){
        return Turma::with('curso')->join('matriculas','turma_id','turmas.id')
                ->select('turmas.*')
                ->where('aluno_id',$aluno)
                ->get();
    }
}
