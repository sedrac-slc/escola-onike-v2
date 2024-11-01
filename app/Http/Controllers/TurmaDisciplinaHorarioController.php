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

    private function existsProfessor($request, $turmaDisciplinaHorario){
        if(!isset($request->professor_id)) return false;
        $data = [
            'professor_id' => $request->professor_id,
            'turma_disciplina_horario_id' => $turmaDisciplinaHorario->id,
        ];
        $professorLenciona = ProfessorLeciona::where($data)->first();
        if(isset($professorLenciona->id)){
            toastr()->success("O professor já leciona esta disciplina");
            return true;
        }
        $data['created_by'] = $data['updated_by'] = auth()->user()->id;
        $data['created_at'] = $data['updated_at'] = now();
        $professorLenciona = ProfessorLeciona::create($data);
        $concat_fields = $professorLenciona->professor->concat_fields.'|'.$turmaDisciplinaHorario->concat_fields;
        $professorLenciona->update([ "concat_fields" => $concat_fields ]);
        toastr()->success("O disciplina adicona com successo ao professor");
        return true;
    }

    public function store(TurmaDisciplinaHorarioRequest $request){

        $data = $request->only(TurmaDisciplinaHorario::FILLABLE);
        $turmaDisciplinaHorario = TurmaDisciplinaHorario::where($data)->first();
        if(!isset($turmaDisciplinaHorario->id)){
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            $turmaDisciplinaHorario = TurmaDisciplinaHorario::create($data);
            if(!$this->existsProfessor($request, $turmaDisciplinaHorario))
                toastr()->success("Operação de criação foi realizada com sucesso");
        }else{
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $turmaDisciplinaHorario->update($data);
            if(!$this->existsProfessor($request, $turmaDisciplinaHorario))
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
