<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\Teacher;

class TeacherObserver
{
    /**
     * Handle the teacher "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Teacher  $teacher
     * @return void
     */
    public function creating(Teacher $teacher)
    {
        $teacher->code = uniqid();
    }

    /**
     * Handle the teacher "updated" event.
     *
     * @param  \Modules\Coordination\Entities\Teacher  $teacher
     * @return void
     */
    public function updated(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "deleting" event.
     *
     * @param  \Modules\Coordination\Entities\Teacher  $teacher
     * @return void
     */
    public function deleting(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Teacher  $teacher
     * @return void
     */
    public function restored(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Teacher  $teacher
     * @return void
     */
    public function forceDeleted(Teacher $teacher)
    {
        //
    }
}
