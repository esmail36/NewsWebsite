<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
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
            return auth()->user()->hasPermissionTo('Index-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Articles');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Index-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To View The Articles');
    }


        // return $admin->hasPermissionTo('Index-Article')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To View The Articles');
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
            return auth()->user()->hasPermissionTo('Create-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Article');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Create-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Create Article');
    }
        

        // return $admin->hasPermissionTo('Create-Article')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Create Article');
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
            return auth()->user()->hasPermissionTo('Edit-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Article');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Edit-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Edit Article');
    }

        // return $admin->hasPermissionTo('Edit-Article')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Edit Article');
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
            return auth()->user()->hasPermissionTo('Delete-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Article');
        }
        elseif(auth('author')->check()){
            return auth()->user()->hasPermissionTo('Delete-Article')
            ?  $this->allow()
            : $this->deny('You Are Not Allowed To Delete Article');
    }

        // return $admin->hasPermissionTo('Delete-Article')
        // ? $this->allow()
        // :  $this->deny('You Are Not Allowed To Delete Article');
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
