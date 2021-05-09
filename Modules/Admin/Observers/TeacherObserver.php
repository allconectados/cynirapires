<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Teacher;

class TeacherObserver
{
    /**
     * Handle the teacher "creating" event.
     *
     * @param  \Modules\Admin\Entities\Teacher  $teacher
     * @return void
     */
    public function creating(Teacher $teacher)
    {
        $teacher->code = uniqid();
    }

    /**
     * Handle the teacher "updated" event.
     *
     * @param  \Modules\Admin\Entities\Teacher  $teacher
     * @return void
     */
    public function updated(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "deleting" event.
     *
     * @param  \Modules\Admin\Entities\Teacher  $teacher
     * @return void
     */
    public function deleting(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "restored" event.
     *
     * @param  \Modules\Admin\Entities\Teacher  $teacher
     * @return void
     */
    public function restored(Teacher $teacher)
    {
        //
    }

    /**
     * Handle the teacher "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Teacher  $teacher
     * @return void
     */
    public function forceDeleted(Teacher $teacher)
    {
        //
    }
}
