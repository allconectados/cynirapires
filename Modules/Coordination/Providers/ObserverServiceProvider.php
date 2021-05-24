<?php

namespace Modules\Coordination\Providers;

use Modules\Coordination\Entities\Discipline;
use Modules\Coordination\Entities\NotaConselho;
use Modules\Coordination\Entities\Reservation;
use Modules\Coordination\Entities\Room;
use Modules\Coordination\Entities\Sala;
use Modules\Coordination\Entities\Schedule;
use Modules\Coordination\Entities\Serie;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\Student;
use Modules\Coordination\Entities\Teacher;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Observers\DisciplineObserver;
use Modules\Coordination\Observers\NotaConselhoObserver;
use Modules\Coordination\Observers\ReservationObserver;
use Modules\Coordination\Observers\RoomObserver;
use Modules\Coordination\Observers\SalaObserver;
use Modules\Coordination\Observers\ScheduleObserver;
use Modules\Coordination\Observers\SerieObserver;
use Modules\Coordination\Observers\StageObserver;
use Modules\Coordination\Observers\StudentObserver;
use Modules\Coordination\Observers\TeacherObserver;
use Modules\Coordination\Observers\YearObserver;
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
        NotaConselho::observe(NotaConselhoObserver::class);
    }
}
