<?php

namespace App\Policies;

use App\Quiz;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    /**
     * Create resource
     *
     * @param User $user
     * @param Quiz $quiz
     * @return boolean
     */
    public function create(User $user, Quiz $quiz)
    {
        $monthAgoDate = now()->subMonth(1);

        return $user->quizzes()
        ->where('created_at', '>', $monthAgoDate)->get()->isEmpty();
    }
}
