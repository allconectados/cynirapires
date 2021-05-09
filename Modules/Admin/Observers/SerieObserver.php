<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Serie;
use Illuminate\Support\Str;

class SerieObserver
{
    /**
     * Handle the serie "creating" event.
     *
     * @param  \Modules\Admin\Entities\Serie  $serie
     * @return void
     */
    public function creating(Serie $serie)
    {
        $serie->code = uniqid();
        $serie->url = Str::slug($serie['title'], '-').'-'.$serie->stage->url;
    }

    /**
     * Handle the serie "updating" event.
     *
     * @param  \Modules\Admin\Entities\Serie  $serie
     * @return void
     */
    public function updating(Serie $serie)
    {
        $serie->url = Str::slug($serie['title'], '-').'-'.$serie->stage->title;
    }

    /**
     * Handle the serie "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Serie  $serie
     * @return void
     */
    public function deleted(Serie $serie)
    {
        //
    }

    /**
     * Handle the serie "restored" event.
     *
     * @param  \Modules\Admin\Entities\Serie  $serie
     * @return void
     */
    public function restored(Serie $serie)
    {
        //
    }

    /**
     * Handle the serie "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Serie  $serie
     * @return void
     */
    public function forceDeleted(Serie $serie)
    {
        //
    }
}
