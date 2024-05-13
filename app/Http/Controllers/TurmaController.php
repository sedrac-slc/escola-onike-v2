<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Turma;
use App\Enum\PeriodoEnum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\TurmaRequest;

class TurmaController extends Controller
{
    public function index(Request $request){
        $turmas = Turma::orderBy('created_at','DESC')->paginate();
        return view('pages.turma',[
            'turmas' => $turmas ,
            'periodos' => PeriodoEnum::list(),
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

}
