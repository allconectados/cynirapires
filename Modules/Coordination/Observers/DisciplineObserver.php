<?php

namespace Modules\Coordination\Observers;

use Illuminate\Support\Str;
use Modules\Coordination\Entities\Discipline;

class DisciplineObserver
{
    /**
     * Handle the discipline "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Discipline  $discipline
     * @return void
     */
    public function creating(Discipline $discipline)
    {
        $discipline->code = uniqid();
        $discipline->url = Str::slug($discipline['title'], '-').'-'.$discipline->room->url;
    }

    /**
     * Handle the discipline "updating" event.
     *
     * @param  \Modules\Coordination\Entities\Discipline  $discipline
     * @return void
     */
    public function updating(Discipline $discipline)
    {
        $discipline->url = Str::slug($discipline['title'], '-').'-'.$discipline->room->url;
    }

    /**
     * Handle the discipline "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Discipline  $discipline
     * @return void
     */
    public function deleted(Discipline $discipline)
    {
        //
    }

    /**
     * Handle the discipline "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Discipline  $discipline
     * @return void
     */
    public function restored(Discipline $discipline)
    {
        //
    }

    /**
     * Handle the discipline "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Discipline  $discipline
     * @return void
     */
    public function forceDeleted(Discipline $discipline)
    {
        //
    }
}
