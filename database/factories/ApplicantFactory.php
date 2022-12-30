<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'last_name' => fake()->lastName(),
            'user_id' => fake()->numberBetween($min = 1, $max = 1),
            'sex' => fake()->randomElement(['male','female']),
            'email' => fake()->safeEmail(),
            'address' => fake()->address(),
            'mobile_number' => fake()->phoneNumber(),
            'birthday' => fake()->date(),
            'applying_for' => fake()->randomElement(['Administrative Aide I','Agricultural Assistant I','Research Administrative Aide IV', 'Utility']),
            'educational_attainment' => fake()->randomElement(['BSIT','BSA','BSND','BEd','BEng']),
            'college_course' => fake()->randomElement(['Masters','Phd']),
            'school_graduated' => fake()->randomElement(['Benguet State University','Saint Louis University']),
            'year_last_attended' => fake()->randomElement(['2015','2016']),
            'previously_applied' => fake()->randomElement(['yes','no']),
            'job_discovery' => fake()->randomElement(['social media','BSU Website','HR Admin Posting']),
            
            'application_letter' => fake()->name('file.pdf'),
            'pds' => fake()->name('file.pdf'),
            'work_experience' => fake()->name('file.pdf'),
            'otr' => fake()->name('file.pdf'),
            'employment_certificates' => fake()->name('file.pdf'),
            'eligibility' => fake()->name('file.pdf'),
            'training_certificates' => fake()->name('file.pdf'),
            'performance_evaluation' => fake()->name('file.pdf'),
            'commendation' => fake()->name('file.pdf'),

            'status'=> fake()->randomElement(['Permanent','Contractual']),
        ];
    }
}
