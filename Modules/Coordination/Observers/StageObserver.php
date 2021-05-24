<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\Stage;
use Illuminate\Support\Str;

class StageObserver
{
    /**
     * Handle the stage "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Stage  $stage
     * @return void
     */
    public function creating(Stage $stage)
    {
        $stage->code = uniqid();
        $stage->url = Str::slug($stage['title'], '-').'-'.$stage->year->url;
    }

    /**
     * Handle the stage "updating" event.
     *
     * @param  \Modules\Coordination\Entities\Stage  $stage
     * @return void
     */
    public function updating(Stage $stage)
    {
        $stage->url = Str::slug($stage['title'], '-').'-'.$stage->year->url;
    }

    /**
     * Handle the stage "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Stage  $stage
     * @return void
     */
    public function deleted(Stage $stage)
    {
        //
    }

    /**
     * Handle the stage "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Stage  $stage
     * @return void
     */
    public function restored(Stage $stage)
    {
        //
    }

    /**
     * Handle the stage "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Stage  $stage
     * @return void
     */
    public function forceDeleted(Stage $stage)
    {
        //
    }
}
