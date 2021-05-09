<?php

namespace Modules\Teacher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Proatec\Entities\Discipline;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Services\EditService;

class DisciplineController extends Controller
{
    /**
     * @var Discipline
     */
    private $model;
    /**
     * @var EditService
     */
    private $edit;

    public function __construct(Discipline $model, EditService $edit)
    {
        $this->model = $model;
        $this->edit = $edit;
    }

    public function index($email)
    {
        $teacher = Teacher::where('email', '=', $email)->first();

        $disciplines = $teacher->disciplines;

        $titlePage = 'Disciplinas';

        return view('teacher::disciplines', compact('titlePage', 'disciplines'));
    }

    public function edit($email, $id)
    {
        $teacher = Teacher::where('email', '=', $email)->first();

        $discipline = $teacher->disciplines->find($id);

        $rooms = $teacher->rooms;

        $titlePage = 'Exxibindo: ' .$discipline->title;

        return view('teacher::edit', compact('rooms', 'titlePage', 'discipline'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
