<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoordenadorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Validator\UserValidator;
use Illuminate\Http\Request;
use App\Models\Coordenador;
use App\Models\Curso;
use App\Models\User;
use Exception;

class CoordenadorController extends Controller
{
    public function index(){
        $coordenadores = Coordenador::orderBy('created_at','DESC')->paginate();
        $cursos = Curso::orderBy('created_at','DESC')->get();
        return view('pages.coordenador',[
            'coordenadores' => $coordenadores,
            'cursos' => $cursos,
            'painel' => 'coordenador'
        ]);
    }

    public function store(CoordenadorRequest $request){
        try{
            $request->validate(['cursos' => 'required']);
            $data = $request->all();
            $data['created_by'] = $data['updated_by'] = auth()->user()->id;
            $data['created_at'] = $data['updated_at'] = now();

            if(!UserValidator::storeRequest($data)) return redirect()->back();

            DB::transaction(function () use ($data){
                $user = User::create($data);
                $data['user_id'] = $user->id;
                $coordenador = Coordenador::create($data);
                $coordenador->cursos()->attach(pivot_audict($data['cursos']));
            });
            toastr()->success("Operação de criação foi realizada com sucesso");
        }catch(Exception){
            toastr()->error("Operação de criação não foi possível a sua realização");
        }
        return redirect()->back();
    }

    public function update(CoordenadorRequest $request, $id){
        try{
            $data = $request->all();
            $data['updated_by'] = auth()->user()->id;
            $data['updated_at'] = now();

            if(!UserValidator::updateRequest($data, $id)) return redirect()->back();

            DB::transaction(function () use ($data, $id){
                $user = User::find($id);
                $user->update($data);
                if(isset($data['cursos'])){
                    $coordenador = Coordenador::where('user_id', $id)->first();
                    $coordenador->cursos()->sync(pivot_audict($data['cursos']));
                }
            });

            toastr()->success("Operação de actualização foi realizada com sucesso");
        }catch(Exception $e){
            dd($e);
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

    public function ajaxCoordenadorCursos($coordenador){
        return Coordenador::find($coordenador)->cursos;
    }

    public function remove(Request $request){
        try{
            if(isset($request->coordenador_id, $request->curso_id)){
                Coordenador::find($request->coordenador_id)->cursos()->detach([$request->curso_id]);
                toastr()->success("Operação de eliminação foi realizada com sucesso");
                return redirect()->back();
            }
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }catch(Exception){
            toastr()->error("Operação de eliminação não foi possível a sua realização");
        }
        return redirect()->back();
    }

}
