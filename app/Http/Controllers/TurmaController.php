<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TurmaRequest;
use App\Enum\AnoCurricularEnum;
use App\Enum\PeriodoEnum;
use App\Models\Turma;
use App\Models\Curso;
use App\Models\Aluno;
use Exception;

class TurmaController extends Controller
{
    public function index(){
        $turmas = Turma::orderBy('created_at','DESC')->paginate();
        $cursos = Curso::orderBy('created_at','DESC')->get();
        return view('pages.turma',[
            'turmas' => $turmas ,
            'cursos' => $cursos,
            'periodos' => PeriodoEnum::list(),
            'anoCurricular' => AnoCurricularEnum::list(),
            'painel' => 'turma'
        ]);
    }

    public function store(TurmaRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Turma::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(TurmaRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $turma = Turma::find($id);
            $turma->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $turma = Turma::find($id);
            $turma->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxTurma($curso){
        return Turma::with('curso')->where('curso_id',$curso)->get();
    }

    public function ajaxAluno($turma){
        return Aluno::with('user')->join('matriculas', 'alunos.id', 'aluno_id')
                ->join('turmas', 'turmas.id', 'turma_id')
                ->where('turma_id', $turma)
                ->select('alunos.*')
                ->get();
    }


}
