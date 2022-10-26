<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
            return auth()->user()->hasPermissionTo('Index-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View Roles');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View Roles');
    }
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
            return auth()->user()->hasPermissionTo('Create-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Role');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Role');
        }
        // return $admin->hasPermissionTo('Create-Role')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create Role');
    
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
            return auth()->user()->hasPermissionTo('Edit-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Role');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Role');
        }


        // return $admin->hasPermissionTo('Edit-Role')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit Role');
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
            return auth()->user()->hasPermissionTo('Delete-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Role');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Role')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Role');
        }


        // return $admin->hasPermissionTo('Delete-Role')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Delete Role');
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
