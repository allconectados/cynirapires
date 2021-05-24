<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\Student;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class StudentObserver
{
    /**
     * Handle the student "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Student  $student
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
     * @param  \Modules\Coordination\Entities\Student  $student
     * @return void
     */
    public function updating(Student $student)
    {

    }

    /**
     * Handle the student "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the student "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the student "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
