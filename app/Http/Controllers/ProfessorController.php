<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfessorRequest;
use App\Http\Controllers\Controller;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
use App\Models\Professor;
use App\Models\User;
use Exception;

class ProfessorController extends Controller
{
    public function index(){
        $professores = Professor::with('disciplinas')->orderBy('created_at','DESC')->paginate();
        $disciplinas = Disciplina::orderBy('created_at','DESC')->get();
        return view('pages.professor',[
            'professores' => $professores,
            'disciplinas' => $disciplinas,
            'painel' => 'professor'
        ]);
    }

    public function store(ProfessorRequest $request){
        try{
            $request->validate(['disciplinas' => 'required']);
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();

            if(!UserValidator::storeRequest($data)) return redirect()->back();

            DB::transaction(function () use ($data){
                $user = User::create($data);
                $professor = $user->professor()->create($data);
                $professor->disciplinas()->sync($data['disciplinas']);
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
                if(isset($data['disciplinas'])) $user->professor->disciplinas()->attach($data['disciplinas']);
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
