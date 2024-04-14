<?php

namespace App\Policies;

use App\Models\Muser;
use App\Models\manajemenMobil;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManajemenMobilPolicy
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
     * @param  \App\Models\manajemenMobil  $manajemenMobil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Muser $muser, manajemenMobil $manajemenMobil)
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
     * @param  \App\Models\manajemenMobil  $manajemenMobil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Muser $muser, manajemenMobil $manajemenMobil)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\manajemenMobil  $manajemenMobil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Muser $muser, manajemenMobil $manajemenMobil)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\manajemenMobil  $manajemenMobil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Muser $muser, manajemenMobil $manajemenMobil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Muser  $muser
     * @param  \App\Models\manajemenMobil  $manajemenMobil
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Muser $muser, manajemenMobil $manajemenMobil)
    {
        //
    }
}
