<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Schedule;
use Illuminate\Support\Str;

class ScheduleObserver
{
    /**
     * Handle the Schedule "creating" event.
     *
     * @param  \Modules\Admin\Entities\Schedule  $schedule
     * @return void
     */
    public function creating(Schedule $schedule)
    {
        $schedule->code = uniqid();
        $schedule->url = Str::slug($schedule['title'], '-').'-'.$schedule->sala->url;
    }

    /**
     * Handle the Schedule "updating" event.
     *
     * @param  \Modules\Admin\Entities\Schedule  $schedule
     * @return void
     */
    public function updating(Schedule $schedule)
    {
        $schedule->url = Str::slug($schedule['title'], '-').'-'.$schedule->sala->url;
    }

    /**
     * Handle the Schedule "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Schedule  $schedule
     * @return void
     */
    public function deleted(Schedule $schedule)
    {
        //
    }

    /**
     * Handle the Schedule "restored" event.
     *
     * @param  \Modules\Admin\Entities\Schedule  $schedule
     * @return void
     */
    public function restored(Schedule $schedule)
    {
        //
    }

    /**
     * Handle the Schedule "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Schedule  $schedule
     * @return void
     */
    public function forceDeleted(Schedule $schedule)
    {
        //
    }
}
