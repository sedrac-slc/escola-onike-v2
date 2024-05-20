<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Models\CursoDisciplinaHorario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
use App\Models\ProfessorLeciona;
use App\Models\Professor;
use App\Models\User;
use Exception;

class ProfessorController extends Controller
{
    public function index(){
        $professores = Professor::orderBy('created_at','DESC')->paginate();
        $cursoDisciplinas = CursoDisciplinaHorario::with('curso', 'disciplina', 'horario')->get();
        return view('pages.professor',[
            'professores' => $professores,
            'cursoDisciplinas' => $cursoDisciplinas,
            'painel' => 'professor'
        ]);
    }

    private function storeDisciplina($professor, $data){
        foreach($data['curso_disciplina_horario'] as $cursoDisciplinaHorario){
            $param = ['professor_id' => $professor->id, 'curso_disciplina_horario_id' => $cursoDisciplinaHorario];
            $professorLeciona = ProfessorLeciona::where($param)->first();
            if(!isset($professorLeciona->id)) {
                $param['created_by'] = $param['updated_by'] = auth()->user()->id;
                $param['created_at'] = $param['updated_at'] = now();
                ProfessorLeciona::create($param);
            }else{
                $param['updated_by'] = auth()->user()->id;
                $param['updated_at'] = now();
                $professorLeciona->update($param);
            }
        }
    }

    public function store(ProfessorRequest $request){
        try{
            $request->validate(['curso_disciplina_horario' => 'required']);
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();

            if(!UserValidator::storeRequest($data)) return redirect()->back();

            DB::transaction(function () use ($data){
                $user = User::create($data);
                $professor = $user->professor()->create($data);
                $this->storeDisciplina($professor, $data);
            });
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(ProfessorRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();

            if(!UserValidator::updateRequest($data, $id)) return redirect()->back();

            DB::transaction(function () use ($data, $id){
                $user = User::find($id);
                $user->update($data);
                $professor = $user->professor;
                $professor->update(["formacao" => $data["formacao"]]);
                if(isset($data['curso_disciplina_horario'])) $this->storeDisciplina($professor, $data);
            });
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $user = User::find($id);
            $user->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }
}
