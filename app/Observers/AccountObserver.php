<?php

namespace App\Observers;

use App\User;

class AccountObserver
{
    /**
     * Handle the = user "created" event.
     *
     * @param  \App\=User  $=User
     * @return void
     */
    public function created(User $User)
    {
        //
    }

    /**
     * Handle the = user "updated" event.
     *
     * @param  \App\=User  $=User
     * @return void
     */
    public function updated(User $User)
    {
        //
    }

    /**
     * Handle the = user "deleted" event.
     *
     * @param  \App\=User  $=User
     * @return void
     */
    public function deleted(User $User)
    {
        //
    }

    /**
     * Handle the = user "restored" event.
     *
     * @param  \App\=User  $=User
     * @return void
     */
    public function restored(User $User)
    {
        //
    }

    /**
     * Handle the = user "force deleted" event.
     *
     * @param  \App\=User  $=User
     * @return void
     */
    public function forceDeleted(User $User)
    {
        //
    }
}
