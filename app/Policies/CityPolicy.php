<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    // index

    public function viewAny()
    {

        if(auth('admin')->check()){
                return auth()->user()->hasPermissionTo('Index-City')
                ?  $this->allow()
                : $this->deny('You Are Not Allowed To View The Cities');
            }
            elseif(auth('author')->check()){
                return auth()->user()->hasPermissionTo('Index-City')
                ?  $this->allow()
                : $this->deny('You Are Not Allowed To View The Cities');
            }



        // return $admin->hasPermissionTo('Index-City') ?
        // $this->allow() : $this->deny('You cannot access this page');

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  show

    public function view()
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  create 

    public function create()
    {
        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create City');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create City');
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  update

    public function update()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit City');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit City');
        }


        // return $admin->hasPermissionTo('Edit-City')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit City');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  destroy

    public function delete()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete City');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-City')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete City');
        }
        
        // return $admin->hasPermissionTo('Delete-City')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Delete City');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore()
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        
    }
}
