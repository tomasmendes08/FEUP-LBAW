<?php

namespace App\Policies;

use App\Models\ReportQuestion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ReportQuestionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Auth::check();
    }


    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ReportQuestion  $reportQuestion
     * @return mixed
     */
    public function delete(User $user, ReportQuestion $reportQuestion)
    {
        return Auth::user()->isAdmin();
    }
}
