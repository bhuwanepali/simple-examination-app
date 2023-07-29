<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questionnaires')->insert([
            [
                'subject' => 'physics',
                'title' => 'What is the SI unit of force?',
                'option_1' => 'Newton',
                'option_2' => 'Joule',
                'option_3' => 'Watt',
                'option_4' => 'Kilogram',
                'right_option' => '1',
                'expiry_date' => '2023-07-30'
            ],
            [
                'subject' => 'physics',
                'title' => 'Which of the following is a unit of electric current?',
                'option_1' => 'Volt',
                'option_2' => 'Watt',
                'option_3' => 'Ampere',
                'option_4' => '	Ohm',
                'right_option' => '3',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'physics',
                'title' => 'What is the acceleration due to gravity on the surface of the Earth?',
                'option_1' => '9.8 m/s²',
                'option_2' => '6.7 m/s²',
                'option_3' => '	3.5 m/s²',
                'option_4' => '5.2 m/s²',
                'right_option' => '1',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'physics',
                'title' => 'Which color of light has the highest frequency?',
                'option_1' => 'Red',
                'option_2' => 'Blue',
                'option_3' => 'Green',
                'option_4' => 'Yellow',
                'right_option' => '2',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'physics',
                'title' => 'When light passes from air into water, it bends. This phenomenon is called:',
                'option_1' => 'Reflection',
                'option_2' => 'Diffraction',
                'option_3' => 'Refraction',
                'option_4' => 'Dispersion',
                'right_option' => '3',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'chemistry',
                'title' => 'What is the chemical symbol for water?',
                'option_1' => 'H2O',
                'option_2' => 'CO2',
                'option_3' => 'CH4',
                'option_4' => 'O2',
                'right_option' => '1',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'chemistry',
                'title' => 'Which gas is essential for respiration and is present in the Earth`s atmosphere?',
                'option_1' => 'Oxygen (O2)',
                'option_2' => 'Carbon dioxide (CO2)',
                'option_3' => 'Hydrogen (H2)',
                'option_4' => 'Nitrogen (N2)',
                'right_option' => '1',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'chemistry',
                'title' => 'What is the chemical formula for table salt (sodium chloride)?',
                'option_1' => 'NaCl',
                'option_2' => 'HCl',
                'option_3' => 'KCl',
                'option_4' => 'MgCl2',
                'right_option' => '1',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'chemistry',
                'title' => 'Which element is the primary constituent of the Earth`s atmosphere?',
                'option_1' => 'Oxygen (O)',
                'option_2' => 'Nitrogen (N)',
                'option_3' => 'Carbon (C)',
                'option_4' => 'Hydrogen (H)',
                'right_option' => '2',
                'expiry_date' => '2023-07-30',
            ],
            [
                'subject' => 'chemistry',
                'title' => 'What is the chemical formula for methane, the main component of natural gas?',
                'option_1' => 'CO2',
                'option_2' => 'CH4',
                'option_3' => 'H2O',
                'option_4' => 'NH3',
                'right_option' => '2',
                'expiry_date' => '2023-07-30',
            ]
        ]);

    }
}