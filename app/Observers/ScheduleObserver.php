<?php

namespace App\Observers;

use App\Models\ScheduleTable;

class ScheduleObserver
{
    /**
     * Handle the ScheduleTable "created" event.
     */
    public function created(ScheduleTable $scheduleTable): void
    {
        //
    }

    /**
     * Handle the ScheduleTable "updated" event.
     */
    public function updated(ScheduleTable $scheduleTable): void
    {
        //
    }

    /**
     * Handle the ScheduleTable "deleted" event.
     */
    public function deleted(ScheduleTable $scheduleTable): void
    {
        //
    }

    /**
     * Handle the ScheduleTable "restored" event.
     */
    public function restored(ScheduleTable $scheduleTable): void
    {
        //
    }

    /**
     * Handle the ScheduleTable "force deleted" event.
     */
    public function forceDeleted(ScheduleTable $scheduleTable): void
    {
        //
    }
}
