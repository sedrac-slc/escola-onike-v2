<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CursoRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Curso;
use Exception;

class CursoController extends Controller
{

    public function index(){
        $cursos = Curso::orderBy('created_at','DESC')->paginate();
        return view('pages.curso',[
            'cursos' => $cursos ,
            'painel' => 'curso'
        ]);
    }

    public function store(CursoRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Curso::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(CursoRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $curso = Curso::find($id);
            $curso->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $curso = Curso::find($id);
            $curso->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function horarioPDF($id){
        $curso = Curso::find($id);
        $pdf = Pdf::loadView('pdfs.horario', ["curso" => $curso]);
        return $pdf->stream("Horário {$curso->nome}.pdf");
    }

}
