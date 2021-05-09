<?php

namespace Database\Factories;

use App\Models\Tasklist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TasklistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tasklist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => 'tasklist',
            'tasks' => null
        ];
    }

}
