<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeaveTypePolicy
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
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Employee $employee, LeaveType $leaveType)
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
        if( $employee->role=="admin"){
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
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Employee $employee, LeaveType $leaveType)
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
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Employee $employee, LeaveType $leaveType)
    {
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Employee $employee, LeaveType $leaveType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Employee  $employee
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Employee $employee, LeaveType $leaveType)
    {
        //
    }
}
