<?php

namespace App\Policies;

use App\Models\Hobby;
use App\Models\Muser;
use Illuminate\Auth\Access\HandlesAuthorization;

class HobbyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Muser  $muser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Muser $muser)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Muser $muser, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Muser  $muser
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Muser $muser)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Muser $muser, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Muser $muser, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Muser $muser, Hobby $hobby)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Muser $muser, Hobby $hobby)
    {
        //
    }
}
