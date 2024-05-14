<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClasseRequest;
use App\Http\Controllers\Controller;
use App\Enum\NumeroClasseEnum;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Turma;
use Exception;

class ClasseController extends Controller
{
    public function index(){
        $classes = Classe::orderBy('created_at','DESC')->paginate();
        $turmas = Turma::orderBy('created_at','DESC')->get();
        $cursos = Curso::orderBy('created_at','DESC')->get();
        return view('pages.classe',[
            'classes' => $classes,
            'turmas' => $turmas,
            'cursos' => $cursos,
            'numeroClasse' => NumeroClasseEnum::list(),
            'painel' => 'classe'
        ]);
    }

    public function store(ClasseRequest $request){
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
