<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuthorPolicy
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
            return auth()->user()->hasPermissionTo('Index-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View Authors');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View Authors');
        }

        // return $admin->hasPermissionTo('Index-Author')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Authors');
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
            return auth()->user()->hasPermissionTo('Create-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Author');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Author');
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
            return auth()->user()->hasPermissionTo('Edit-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Author');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Author');
        }
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
            return auth()->user()->hasPermissionTo('Delete-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Author');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Author')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Author');
        }
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
