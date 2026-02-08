<?php

namespace App\Observers;

use App\Models\Vhl;
use App\Models\HistStatut;
use Illuminate\Support\Facades\Auth;

class VhlObserver
{
    /**
     * Handle the Vhl "created" event.
     */
    public function created(Vhl $vhl): void
    {
        //
    }

    /**
     * Handle the Vhl "updated" event.
     */
    public function updated(Vhl $vhl): void
    {
        if ($vhl->isDirty('statut_id')) {
            HistStatut::create([
                'vhl_id' => $vhl->id,
                'ancien_statut_id' => $vhl->getOriginal('statut_id'),
                'nouveau_statut_id' => $vhl->statut_id,
                'user_id' => Auth::check() ? Auth::Id() : (request()->header('X-User-ID')), // Check if user is authenticated before getting ID
                'commentaire' => 'Changement automatique via système'
            ]);
        }
    }

    /**
     * Handle the Vhl "deleted" event.
     */
    public function deleted(Vhl $vhl): void
    {
        //
    }

    /**
     * Handle the Vhl "restored" event.
     */
    public function restored(Vhl $vhl): void
    {
        //
    }

    /**
     * Handle the Vhl "force deleted" event.
     */
    public function forceDeleted(Vhl $vhl): void
    {
        //
    }
}
