<?php

namespace App\Http\Controllers;

use App\Enum\FuncaoEnum;
use App\Http\Requests\FuncionarioRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
use App\Models\Funcionario;
use App\Models\User;
use Exception;

class FuncionarioController extends Controller
{
    public function index(){
        $funcionarios = Funcionario::orderBy('created_at','DESC')->paginate();
        return view('pages.funcionario',[
            'funcionarios' => $funcionarios,
            'funcoes' => FuncaoEnum::jobs(),
            'painel' => 'funcionario'
        ]);
    }

    public function store(FuncionarioRequest $request){
        try{
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();

            if(!UserValidator::storeRequest($data)) return redirect()->back();

            DB::transaction(function () use ($data){
                User::create($data)->funcionario()->create($data);
            });
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(FuncionarioRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();

            if(!UserValidator::updateRequest($data, $id)) return redirect()->back();

            DB::transaction(function () use ($data, $id){
                $user = User::find($id);
                $user->update($data);
                $user->funcionario->update($data);
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
