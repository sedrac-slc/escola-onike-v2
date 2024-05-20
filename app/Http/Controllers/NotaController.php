<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\NotaRequest;
use App\Models\Aluno;
use App\Models\Nota;
use Exception;

class NotaController extends Controller
{
    public function index(){

        $alunos = Aluno::orderBy('created_at','DESC')->get();

        $aluno = Nota::join('alunos', 'notas.aluno_id', 'alunos.id')
                ->get();

        return view('pages.nota',[
            'alunos' => $alunos,
            'painel' => 'nota'
        ]);
    }

    public function store(NotaRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Nota::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(NotaRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $nota = Nota::find($id);
            $nota->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $nota = Nota::find($id);
            $nota->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }
}
