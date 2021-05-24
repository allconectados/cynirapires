<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\Room;
use Illuminate\Support\Str;

class RoomObserver
{
    /**
     * Handle the room "creating" event.
     *
     * @param  \Modules\Coordination\Entities\Room  $room
     * @return void
     */
    public function creating(Room $room)
    {
        $room->code = uniqid();
        $room->url = Str::slug($room['title'], '-').'-'.$room->serie->url;
    }

    /**
     * Handle the room "updated" event.
     *
     * @param  \Modules\Coordination\Entities\Room  $room
     * @return void
     */
    public function updated(Room $room)
    {
        //
    }

    /**
     * Handle the room "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Room  $room
     * @return void
     */
    public function deleted(Room $room)
    {
        //
    }

    /**
     * Handle the room "restored" event.
     *
     * @param  \Modules\Coordination\Entities\Room  $room
     * @return void
     */
    public function restored(Room $room)
    {
        //
    }

    /**
     * Handle the room "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\Room  $room
     * @return void
     */
    public function forceDeleted(Room $room)
    {
        //
    }
}
