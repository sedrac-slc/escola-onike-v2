<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculaRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Turma;
use Exception;

class MatriculaController extends Controller
{
    public function index(){
        $matriculas = Matricula::orderBy('created_at','DESC')->paginate();
        return view('pages.matricula',[
            'matriculas' => $matriculas ,
            'painel' => 'matricula'
        ]);
    }

    public function store(MatriculaRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();
            Matricula::create($data);
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(MatriculaRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();
            $matricula = Matricula::find($id);
            $matricula->update($data);
            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de actualização não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function destroy($id){
        try{
            $matricula = Matricula::find($id);
            $matricula->delete();
            toastr()->success("Operação de eliminação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function matricula(Request $request){
        try{
            if(isset($request->aluno_id, $request->turma_id)){
                $data = $request->all();
                $data['created_by'] = $data['updated_by'] = auth()->user()->id;
                $data['created_at'] = $data['updated_at'] = now();
                Matricula::updateOrCreate(['turma_id' => $data['turma_id'], 'aluno_id' => $data['aluno_id']],$data);
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function remove(Request $request){
        try{
            if(isset($request->aluno_id, $request->turma_id)){
                $data = $request->all();
                $matricula = Matricula::where(['turma_id' => $data['turma_id'], 'aluno_id' => $data['aluno_id']])->first();
                $matricula->delete();
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function ajaxTurma($aluno){
        return Turma::with('curso')->join('matriculas','turma_id','turmas.id')
                ->select('turmas.*')
                ->where('aluno_id',$aluno)
                ->get();
    }
}
