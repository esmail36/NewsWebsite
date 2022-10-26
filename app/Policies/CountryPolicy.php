<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
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
            return auth()->user()->hasPermissionTo('Index-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Countries');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Countries');
        }

        // return $admin->hasPermissionTo('Index-Country')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Countries');
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
            return auth()->user()->hasPermissionTo('Create-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Country');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Country');
        }

        // return $admin->hasPermissionTo('Create-Country')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create Country');
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
            return auth()->user()->hasPermissionTo('Edit-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Country');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Country');
        }

        // return $admin->hasPermissionTo('Edit-Country')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit Country');
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
            return auth()->user()->hasPermissionTo('Delete-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Country');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Country')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Country');
        }

    //     return $admin->hasPermissionTo('Delete-Country')
    //     ? $this->allow()
    //     :  $this->deny('You Are Not Allowed To Delete Country');
    // }
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
