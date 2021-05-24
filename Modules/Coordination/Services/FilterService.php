<?php


namespace Modules\Coordination\Services;

use Illuminate\Http\Request;

class FilterService
{
    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    public function filterDataForm(
        $table,
        string $column,
        string $orderBy,
        string $direction
    ) {
        $search = $this->request->input('search');

        $datas = $table::where($column, 'LIKE', '%' . $search . '%')
            ->orderBy($orderBy, $direction)->paginate(10);

        return $datas->appends(['search' => $search]);
    }

    public function filterDataStudent(
        $table,
        string $roomsStudent,
        int $totalPage
    ) {
        $datas = $table::where('room', 'LIKE', $roomsStudent)
            ->orderBy('room', 'asc')
            ->orderByRaw('(room - number) desc')
            ->orderBy('number', 'asc')
            ->paginate($totalPage);

        return $datas->appends(['roomStudent' => $roomsStudent]);
    }
}
