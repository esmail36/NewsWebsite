<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
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
            return auth()->user()->hasPermissionTo('Index-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Admins');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Admins');
    }


        // return $admin->hasPermissionTo('Index-Admin')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Admins');
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
            return auth()->user()->hasPermissionTo('Create-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create An Admin');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create An Admin');
    }

        // return $admin->hasPermissionTo('Create-Admin')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create An Admin');
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
            return auth()->user()->hasPermissionTo('Edit-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit An Admin');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit An Admin');
    }


        // return $admin->hasPermissionTo('Edit-Admin')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit An Admin');
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
            return auth()->user()->hasPermissionTo('Delete-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete An Admin');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Admin')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete An Admin');
    }


        // return $admin->hasPermissionTo('Delete-Admin')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Delete An Admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Admin $admin)
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
    public function forceDelete(Admin $admin)
    {
        
    }
}
