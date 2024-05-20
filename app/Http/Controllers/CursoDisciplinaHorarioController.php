<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoDisciplinaHorarioRequest;
use App\Models\CursoDisciplinaHorario;
use App\Http\Controllers\Controller;
use App\Models\ProfessorLeciona;
use Illuminate\Http\Request;
use Exception;

class CursoDisciplinaHorarioController extends Controller
{

    public function store(CursoDisciplinaHorarioRequest $request){

        $data = $request->only(CursoDisciplinaHorario::FILLABLE);
        $cursoDisciplinaHorario = CursoDisciplinaHorario::where($data)->first();

        if(!isset($cursoDisciplinaHorario->id)){
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            CursoDisciplinaHorario::create($data);
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

            if(isset($request->professor_id, $request->curso_disciplina_horario_id)){
                $professorLenciona = ProfessorLeciona::where([
                   'curso_disciplina_horario_id' => $request->curso_disciplina_horario_id, 'professor_id' => $request->professor_id
                ])->first();
                $professorLenciona->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }elseif(isset($request->curso_disciplina_horario_id)){
                $cursoDisciplinaHorario = CursoDisciplinaHorario::find($request->curso_disciplina_horario_id);
                $cursoDisciplinaHorario->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxCurso($curso){
        return CursoDisciplinaHorario::with('curso', 'disciplina', 'horario')->where('curso_id', $curso)->get();
    }

    public function ajaxDisciplina($disciplina){
        return CursoDisciplinaHorario::with('curso', 'disciplina', 'horario')->where('disciplina_id', $disciplina)->get();
    }

    public function ajaxProfessor($professor){
        return CursoDisciplinaHorario::with('curso', 'disciplina', 'horario')
        ->join(ProfessorLeciona::TABLE,'curso_disciplina_horario_id', CursoDisciplinaHorario::TABLE .'.id')
        ->select(CursoDisciplinaHorario::TABLE . '.*')
        ->where('professor_id', $professor)
        ->get();
    }

}
