<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\Leave;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeavePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Employee $employee)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Employee $employee, Leave $leave)
    {
        return true;

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Employee $employee)
    {
        if( $employee->role=="employee"){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Employee $employee, Leave $leave)
    {
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Employee $employee, Leave $leave)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Employee $employee, Leave $leave)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Employee $employee, Leave $leave)
    {
        //
    }
}
