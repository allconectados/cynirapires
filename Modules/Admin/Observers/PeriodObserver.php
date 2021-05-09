<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Period;
use Illuminate\Support\Str;

class PeriodObserver
{
    /**
     * Handle the Period "creating" event.
     *
     * @param  \Modules\Admin\Entities\Period  $period
     * @return void
     */
    public function creating(Period $period)
    {
        $period->code = uniqid();
        $period->url = Str::slug($period['title'], '-').'-'.$period->serie->url;
    }

    /**
     * Handle the Period "updated" event.
     *
     * @param  \Modules\Admin\Entities\Period  $period
     * @return void
     */
    public function updated(Period $period)
    {
        //
    }

    /**
     * Handle the Period "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Period  $period
     * @return void
     */
    public function deleted(Period $period)
    {
        //
    }

    /**
     * Handle the Period "restored" event.
     *
     * @param  \Modules\Admin\Entities\Period  $period
     * @return void
     */
    public function restored(Period $period)
    {
        //
    }

    /**
     * Handle the Period "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Period  $period
     * @return void
     */
    public function forceDeleted(Period $period)
    {
        //
    }
}
