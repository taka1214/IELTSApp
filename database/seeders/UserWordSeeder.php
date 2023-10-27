<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Word;

class UserWordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::find(1);
        $user4 = User::find(4);
        $user5 = User::find(5);

        // ユーザーidが1のユーザーに関する設定
        $user1->words()->syncWithoutDetaching($this->generateWordData(range(1, 10), 1));
        $user1->words()->syncWithoutDetaching($this->generateWordData(range(11, 25), 2));

        // ユーザーidが4のユーザーに関する設定
        $user4->words()->syncWithoutDetaching($this->generateWordData(range(1, 10), 1));
        $user4->words()->syncWithoutDetaching($this->generateWordData(range(11, 25), 2));

        // ユーザーidが5のユーザーに関する設定
        $user5->words()->syncWithoutDetaching($this->generateWordData(range(1, 15), 1));
        $user5->words()->syncWithoutDetaching($this->generateWordData(range(16, 25), 2));
    }

    /**
     * Generate an associative array for the word IDs and their corresponding 'memorised' values.
     *
     * @param array $wordIds
     * @param int $memorisedValue
     * @return array
     */
    private function generateWordData(array $wordIds, int $memorisedValue): array
    {
        $data = [];
        foreach ($wordIds as $wordId) {
            $data[$wordId] = ['memorised' => $memorisedValue];
        }
        return $data;
    }
}
