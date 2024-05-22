<?php

namespace App\Http\Controllers;

use App\Http\Requests\TurmaDisciplinaHorarioRequest;
use App\Models\TurmaDisciplinaHorario;
use App\Http\Controllers\Controller;
use App\Models\ProfessorLeciona;
use Illuminate\Http\Request;
use Exception;

class TurmaDisciplinaHorarioController extends Controller
{

    public function store(TurmaDisciplinaHorarioRequest $request){

        $data = $request->only(TurmaDisciplinaHorario::FILLABLE);
        $cursoDisciplinaHorario = TurmaDisciplinaHorario::where($data)->first();

        if(!isset($cursoDisciplinaHorario->id)){
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            TurmaDisciplinaHorario::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }else{
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $cursoDisciplinaHorario->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }
        return redirect()->back();
    }

    public function remove(Request $request){
        try{
            if(isset($request->professor_id, $request->turma_disciplina_horario_id)){
                $professorLenciona = ProfessorLeciona::where([
                   'turma_disciplina_horario_id' => $request->turma_disciplina_horario_id, 'professor_id' => $request->professor_id
                ])->first();
                $professorLenciona->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }elseif(isset($request->turma_disciplina_horario_id)){
                $turmaDisciplinaHorario = TurmaDisciplinaHorario::find($request->turma_disciplina_horario_id);
                $turmaDisciplinaHorario->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxCurso($turma){
        return TurmaDisciplinaHorario::with('turma.curso', 'disciplina', 'horario')->where('turma_id', $turma)->get();
    }

    public function ajaxDisciplina($disciplina){
        return TurmaDisciplinaHorario::with('turma.curso', 'disciplina', 'horario')->where('disciplina_id', $disciplina)->get();
    }

    public function ajaxProfessor($professor){
        return TurmaDisciplinaHorario::with('turma.curso', 'disciplina', 'horario')
        ->join(ProfessorLeciona::TABLE,'turma_disciplina_horario_id', TurmaDisciplinaHorario::TABLE .'.id')
        ->select(TurmaDisciplinaHorario::TABLE . '.*')
        ->where('professor_id', $professor)
        ->get();
    }

}
