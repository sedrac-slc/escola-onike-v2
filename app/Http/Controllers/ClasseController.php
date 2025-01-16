<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClasseRequest;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Curso;

class ClasseController extends Controller
{
    public function index(){
        $classes = Classe::orderBy('created_at','DESC')->paginate();
        $cursos = Curso::get();
        return view('pages.classe',[
            'classes' => $classes,
            'cursos' => $cursos,
            'painel' => 'classe'
        ]);
    }

    public function findByCurso(Request $request){
        if(!isset($request->curso)) return [];
        return Classe::where('curso_id', $request->curso)->orderBy('created_at','DESC')->get();
    }

    public function store(ClasseRequest $request){
        if(classe::where($request->only(['curso_id','num_classe']))->exists()){
            toastr()->Warning("O registro já se encontra cadastrado");
            return redirect()->back();
        }
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Classe::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(ClasseRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $classe = Classe::find($id);
            $classe->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $classe = Classe::find($id);
            $classe->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }
}
