<?php

namespace Modules\Admin\Providers;

use Modules\Admin\Entities\Discipline;
use Modules\Admin\Entities\Reservation;
use Modules\Admin\Entities\Room;
use Modules\Admin\Entities\Sala;
use Modules\Admin\Entities\Schedule;
use Modules\Admin\Entities\Serie;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Student;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Entities\Year;
use Modules\Admin\Observers\DisciplineObserver;
use Modules\Admin\Observers\ReservationObserver;
use Modules\Admin\Observers\RoomObserver;
use Modules\Admin\Observers\SalaObserver;
use Modules\Admin\Observers\ScheduleObserver;
use Modules\Admin\Observers\SerieObserver;
use Modules\Admin\Observers\StageObserver;
use Modules\Admin\Observers\StudentObserver;
use Modules\Admin\Observers\TeacherObserver;
use Modules\Admin\Observers\YearObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Teacher::observe(TeacherObserver::class);
        Student::observe(StudentObserver::class);
        Sala::observe(SalaObserver::class);
        Schedule::observe(ScheduleObserver::class);
        Reservation::observe(ReservationObserver::class);
        Year::observe(YearObserver::class);
        Stage::observe(StageObserver::class);
        Serie::observe(SerieObserver::class);
        Room::observe(RoomObserver::class);
        Discipline::observe(DisciplineObserver::class);
    }
}
