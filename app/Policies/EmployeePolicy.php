<?php

namespace App\Policies;

use App\Models\Employee;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployeePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(Employee $employee)
    {
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    public function view(Employee $employee, Employee $model)
    {
        
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    public function create(Employee $employee)
    {
        
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    public function update(Employee $employee, Employee $model)
    {
        
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete(Employee $employee, Employee $model)
    {
        
        if( $employee->role=="admin"){
            return true;
        }
        else{
            return false;
        }
    }

}
