<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
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
                User::create($data)->aluno()->create($data);
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
                $user->aluno->update($data);
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
