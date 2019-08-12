<?php

namespace Tests\Unit;

use App\Quiz;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        $quiz = factory(Quiz::class)->create();

        $this->assertInstanceOf(User::class, $quiz->user);
    }
}
