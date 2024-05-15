<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class questionseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $survey = Survey::first(); // Ga ervan uit dat er al een enquête is gemaakt

        if ($survey) {
            $survey->questions()->createMany([
                [
                    'question_text' => 'Wat is de hoofdstad van Frankrijk?',
                    'options' => ['A. Berlijn', 'B. Madrid', 'C. Parijs', 'D. Rome'],
                    'correct_answer' => 'C'
                ],
                [
                    'question_text' => 'Wat is 2 + 2?',
                    'options' => ['A. 3', 'B. 4', 'C. 5', 'D. 6'],
                    'correct_answer' => 'B'
                ],
                [
                    'question_text' => 'Wie schreef "To be, or not to be"?',
                    'options' => ['A. Dante', 'B. Cervantes', 'C. Shakespeare', 'D. Homerus'],
                    'correct_answer' => 'C'
                ],
                [
                    'question_text' => 'Wat is de grootste planeet in ons zonnestelsel?',
                    'options' => ['A. Aarde', 'B. Mars', 'C. Jupiter', 'D. Saturnus'],
                    'correct_answer' => 'C'
                ],
                [
                    'question_text' => 'Wat is de snelheid van het licht?',
                    'options' => ['A. 299.792 km/s', 'B. 150.000 km/s', 'C. 1.000 km/s', 'D. 3.000 km/s'],
                    'correct_answer' => 'A'
                ]
            ]);
        }
    }
}
