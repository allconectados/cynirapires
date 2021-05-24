<?php

namespace Modules\Coordination\Observers;

use Modules\Coordination\Entities\NotaConselho;

class NotaConselhoObserver
{
    /**
     * Handle the nota "creating" event.
     *
     * @param  \Modules\Coordination\Entities\NotaConselho  $nota
     * @return void
     */
    public function creating(NotaConselho $nota)
    {
        $nota->code = uniqid();
    }

    /**
     * Handle the nota "updating" event.
     *
     * @param  \Modules\Coordination\Entities\NotaConselho  $nota
     * @return void
     */
    public function updating(NotaConselho $nota)
    {

    }

    /**
     * Handle the nota "deleted" event.
     *
     * @param  \Modules\Coordination\Entities\NotaConselho  $nota
     * @return void
     */
    public function deleted(NotaConselho $nota)
    {
        //
    }

    /**
     * Handle the nota "restored" event.
     *
     * @param  \Modules\Coordination\Entities\NotaConselho  $nota
     * @return void
     */
    public function restored(NotaConselho $nota)
    {
        //
    }

    /**
     * Handle the nota "force deleted" event.
     *
     * @param  \Modules\Coordination\Entities\NotaConselho  $nota
     * @return void
     */
    public function forceDeleted(NotaConselho $nota)
    {
        //
    }
}
