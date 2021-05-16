<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\YearStoreFormRequest;
use Modules\Admin\Http\Requests\YearUpdateFormRequest;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class YearController extends Controller
{
    /**
     * @var Year
     */
    private $model;
    /**
     * @var StoreService
     */
    private $store;
    /**
     * @var EditService
     */
    private $edit;
    /**
     * @var UpdateService
     */
    private $update;
    /**
     * @var DestroyService
     */
    private $destroy;

    /**
     * YearController constructor.
     * @param  Year  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Year $model,
        StoreService $store,
        EditService $edit,
        UpdateService $update,
        DestroyService $destroy
    ) {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
    }

    public function index()
    {
        $titlePage = 'Gerenciar Ano';

        $years = Year::paginate(2);

        return view('admin::years.index', compact('titlePage', 'years'));
    }

    public function store(YearStoreFormRequest $classFormRequest)
    {
        // Retorna o valor do input title na view admins.years.index
        $title = request()->get('title');

        // Retorna o valor da coluna title da tabela years e compara com o valor do input
        $year = DB::table('years')->select('title')
            ->where('title', '=', $title)
            ->first();

        // Verifica se existe o valor na tabela
        if (isset($year) && $year->title == request()->input('title')) {
            // Se existir retorna um alerta
            alert()->warning('Atenão', 'Você já adicionou este ano');
            return redirect()->back();
        } else {
            // Se não existir cria um novo registro
            return $this->store->storeData($classFormRequest, $this->model);

        }
    }

    public function destroy($id)
    {
        // Retorna o valor do campo year_id e compara com o id do ano
        $year_id = DB::table('stages')->where('year_id', '=', $id)->first();

        // Verifica se existe registros relacionados na tabela stages
        if ($year_id) {
            // Se existir registros na tabela stages com omvalor da variável $year_id, retorna um alerta
            alert()->warning('Atenão', 'Não foi possível excluír o registro, existem dados relacionado!');
            return redirect()->back();
        } else {
            return $this->destroy->destroyData($this->model, $id);
        }
    }
}
