<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Student;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class StudentObserver
{
    /**
     * Handle the student "creating" event.
     *
     * @param  \Modules\Admin\Entities\Student  $student
     * @return void
     */
    public function creating(Student $student)
    {
        $student->code = uniqid();
        $student->active = 1;
    }

    /**
     * Handle the student "updating" event.
     *
     * @param  \Modules\Admin\Entities\Student  $student
     * @return void
     */
    public function updating(Student $student)
    {

    }

    /**
     * Handle the student "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the student "restored" event.
     *
     * @param  \Modules\Admin\Entities\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the student "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
