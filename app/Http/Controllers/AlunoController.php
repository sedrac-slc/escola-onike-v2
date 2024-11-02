<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\User;
use Exception;

class AlunoController extends Controller
{
    public function index(){
        $alunos = Aluno::orderBy('created_at','DESC')->paginate();
        $turmas = Turma::orderBy('created_at','DESC')->get();
        return view('pages.aluno',[
            'alunos' => $alunos,
            'turmas' => $turmas,
            'painel' => 'aluno'
        ]);
    }

    public function store(AlunoRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();

            if(!UserValidator::storeRequest($data)) return redirect()->back();

            DB::transaction(function () use ($data){
                $user = User::create($data);
                $user_concat_fields = $user->concatFields();
                $aluno = $user->aluno()->create($data);

                $aluno->update(["concat_fields" => $user_concat_fields]);
                $user->update(["concat_fields" => $user_concat_fields]);
            });
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(AlunoRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();

            if(!UserValidator::updateRequest($data, $id)) return redirect()->back();

            DB::transaction(function () use ($data, $id){
                $user = User::find($id);
                $user->update($data);
                $user_concat_fields = $user->concatFields();

                $aluno = $user->aluno;
                $aluno->update($data);

                $aluno->update(["concat_fields" => $user_concat_fields]);
                $user->update([ "concat_fields" => $user_concat_fields]);
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

    public function ajaxSearch(Request $request){
        if(isset($request->aluno)) return Aluno::with('user')->where('id',$request->aluno)->get();
        return Aluno::with('user')->where('concat_fields','like',"%{$request->content}%")->get();
    }

    public function ajaxCurso($curso){
        return Aluno::with('user')->join('matriculas','aluno_id','alunos.id')
            ->join('turmas','turma_id','turmas.id')
            ->join('cursos','curso_id','cursos.id')
            ->select('alunos.*')
            ->distinct('alunos.id')
            ->where('curso_id', $curso)
            ->get();
    }

}
