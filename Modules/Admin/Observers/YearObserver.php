<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Year;
use Illuminate\Support\Str;

class YearObserver
{
    /**
     * Handle the year "creating" event.
     *
     * @param  \Modules\Admin\Entities\Year  $year
     * @return void
     */
    public function creating(Year $year)
    {
        $year->code = uniqid();
        $year->url = Str::slug($year['title'], '-');
    }

    /**
     * Handle the year "updating" event.
     *
     * @param  \Modules\Admin\Entities\Year  $year
     * @return void
     */
    public function updating(Year $year)
    {
        $year->url = Str::slug($year['title'], '-');
    }

    /**
     * Handle the year "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Year  $year
     * @return void
     */
    public function deleted(Year $year)
    {
        //
    }

    /**
     * Handle the year "restored" event.
     *
     * @param  \Modules\Admin\Entities\Year  $year
     * @return void
     */
    public function restored(Year $year)
    {
        //
    }

    /**
     * Handle the year "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Year  $year
     * @return void
     */
    public function forceDeleted(Year $year)
    {
        //
    }
}
