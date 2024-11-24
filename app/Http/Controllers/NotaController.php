<?php

namespace App\Http\Controllers;

use App\Models\TurmaDisciplinaHorario;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotaRequest;
use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Trimestre;
use App\Models\Aluno;
use App\Models\Nota;
use Exception;

class NotaController extends Controller
{
    public function index(){
        $auth = auth()->user();

        if($auth->isProfessor()){
            $professor = $auth->professor;
            $turmaDisciplinaHorarios = $professor->leciona()->get();
        }elseif($auth->isCoordenador()){
            $coordenador =  $auth->coordenador;
            $cursos = $coordenador->cursos->map(function($curso){  return $curso->id; });
            $turmaDisciplinaHorarios = TurmaDisciplinaHorario::join('turmas','turma_id','turmas.id')
            ->join('cursos','curso_id','cursos.id')
            ->select(TurmaDisciplinaHorario::TABLE.'.*')
            ->whereIn('cursos.id', $cursos)
            ->get();
        }elseif($auth->isDirectorOrSecretario()){
            $turmaDisciplinaHorarios = TurmaDisciplinaHorario::orderBy('created_at', 'DESC')->paginate();
        }else{
            toastr()->warning("Não tens permissão para acessar o painel de notas");
            return redirect()->back();
        }

        return view('pages.lancar.turma',[
            'turmaDisciplinaHorarios' => $turmaDisciplinaHorarios, 'painel' => 'nota'
        ]);
    }

    public function alunos($id){
        $turmaDisciplinaHorario = TurmaDisciplinaHorario::find($id);
        $alunos = Aluno::with('user')->join(Matricula::TABLE, 'aluno_id', 'alunos.id')
            ->where('turma_id',$turmaDisciplinaHorario->turma_id)
            ->select('alunos.*')
            ->get();

        if(sizeof($alunos) == 0){
            toastr()->warning("Esta turma não tem alunos, adiciona alunos nesta turma");
            return back();
        }

        return view('pages.lancar.aluno',[
            'alunos' => $alunos,
            'trimestres' => Trimestre::orderBy('created_at', 'DESC')->get(),
            'turmaDisciplinaHorario' => $turmaDisciplinaHorario,
            'painel' => 'nota'
        ]);
    }

    public function aluno(){
        $notas = Nota::where('aluno_id', auth()->user()->aluno->id)
                    ->orderBy('created_by','DESC')
                    ->paginate();

        return view('pages.lancar.nota',[ 'notas' => $notas, 'painel' => 'nota']);
    }

    public function lancar(Request $request){
        $request->validate([
            'turma_disciplina_horario' => 'required', 'alunos' => 'required',
            'npt' => 'required', 'npp' => 'required', 'mac' => 'required',
            'mt1' => 'required', 'mt2' => 'required', 'mt3' => 'required',
            'exame' => 'required', 'mfd' => 'required', 'mf' => 'required'
        ]);

        $data = $request->all();
        $tam = sizeof($data['alunos']);
        $arraySizeof = [
            sizeof($data['npt']), sizeof($data['npp']) , sizeof($data['mac']),
            sizeof($data['mt1']), sizeof($data['mt2']) , sizeof($data['mt3']),
            sizeof($data['exame']), sizeof($data['mfd']) , sizeof($data['mf'])
        ];

        if($this->anyEqual($arraySizeof, $tam)){
            $turmaDisciplinaHorario = TurmaDisciplinaHorario::find($data['turma_disciplina_horario']);

            for ($i = 0; $i < $tam; $i++) {
               $alunos = [
                    'aluno_id' => $data['alunos'][$i],
                    'disciplina_id' => $turmaDisciplinaHorario->disciplina_id,
                    'turma_id' => $turmaDisciplinaHorario->turma_id,
                    "trimestre_id" => $request->trimestre_id
                ];
               $notas = [
                    "npt" => $data['npt'][$i], "npp" => $data['npp'][$i], "mac" => $data['mac'][$i],
                    "mt1" => $data['mt1'][$i], "mt2" => $data['mt2'][$i], "mt3" => $data['mt3'][$i],
                    "exame" => $data['exame'][$i], "mfd" => $data['mfd'][$i], "mf" => $data['mf'][$i],
                    "trimestre_id" => $request->trimestre_id
                ];
                Nota::updateOrCreate($alunos, array_merge($alunos, $notas));
            }
            toastr()->success("Operação de eliminação foi realizada com sucesso");
            return redirect()->back();
        }

        toastr()->error("Operação de eliminação não foi possível a sua realização");
        return redirect()->back();
    }

    private function anyEqual($array, $valor) {
        foreach ($array as $elemento)
            if ($elemento !== $valor) return false;
        return true;
    }

}
