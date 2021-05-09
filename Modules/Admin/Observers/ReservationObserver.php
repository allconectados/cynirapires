<?php

namespace Modules\Admin\Observers;

use Modules\Admin\Entities\Reservation;
use Illuminate\Support\Str;

class ReservationObserver
{
    /**
     * Handle the Reservation "creating" event.
     *
     * @param  \Modules\Admin\Entities\Reservation  $reservation
     * @return void
     */
    public function creating(Reservation $reservation)
    {
        $reservation->code = uniqid();
    }

    /**
     * Handle the Reservation "updating" event.
     *
     * @param  \Modules\Admin\Entities\Reservation  $reservation
     * @return void
     */
    public function updating(Reservation $reservation)
    {
    }

    /**
     * Handle the Reservation "deleted" event.
     *
     * @param  \Modules\Admin\Entities\Reservation  $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "restored" event.
     *
     * @param  \Modules\Admin\Entities\Reservation  $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "force deleted" event.
     *
     * @param  \Modules\Admin\Entities\Reservation  $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        //
    }
}
