<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
            return auth()->user()->hasPermissionTo('Index-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Categories');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Categories');
    }

        // return $admin->hasPermissionTo('Index-Category')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Categories');
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
            return auth()->user()->hasPermissionTo('Create-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Category');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Category');
    }

        // return $admin->hasPermissionTo('Create-Category')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create Category');
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
            return auth()->user()->hasPermissionTo('Edit-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Category');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Category');
    }

        // return $admin->hasPermissionTo('Edit-Category')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit Category');
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
            return auth()->user()->hasPermissionTo('Delete-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Category');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Category')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Category');
    }

        // return $admin->hasPermissionTo('Delete-Category')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Delete Category');
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
