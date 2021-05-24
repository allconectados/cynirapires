<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\Sala;
use Illuminate\Support\Str;

class SalaObserver
{
    /**
     * Handle the Sala "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Sala  $sala
     * @return void
     */
    public function creating(Sala $sala)
    {
        $sala->code = uniqid();
        $sala->url = Str::slug($sala['title'], '-').'-'.$sala->stage->url;
    }

    /**
     * Handle the Sala "updating" event.
     *
     * @param  \Modules\Coordination\Entities\Sala  $sala
     * @return void
     */
    public function updating(Sala $sala)
    {
        $sala->url = Str::slug($sala['title'], '-').'-'.$sala->stage->url;
    }

    /**
     * Handle the Sala "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Sala  $sala
     * @return void
     */
    public function deleted(Sala $sala)
    {
        //
    }

    /**
     * Handle the Sala "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Sala  $sala
     * @return void
     */
    public function restored(Sala $sala)
    {
        //
    }

    /**
     * Handle the Sala "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Sala  $sala
     * @return void
     */
    public function forceDeleted(Sala $sala)
    {
        //
    }
}
