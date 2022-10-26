<?php

namespace App\Policies;


use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
            return auth()->user()->hasPermissionTo('Index-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Permissions');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Permissions');
        }

        // return $admin->hasPermissionTo('Index-Permission')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Permissions');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
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
            return auth()->user()->hasPermissionTo('Create-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Permission');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Permission');
        }

        // return $admin->hasPermissionTo('Create-Permission')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create Permission');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  update

    public function update()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Edit-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Permission');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Permission');
        }

        // return $admin->hasPermissionTo('Edit-Permission')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit Permission');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    //  destroy

    public function delete()
    {

        if(auth('admin')->check()){
            return auth()->user()->hasPermissionTo('Delete-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Permission');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Permission')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Permission');
        }

    //     return $admin->hasPermissionTo('Delete-Permission')
    //     ? $this->allow()
    //     :  $this->deny('You Are Not Allowed To Delete Permission');
    // }

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
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
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete()
    {
        
    }
}
