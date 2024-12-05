<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the test user
        $testUser = User::where('email', 'test@test.com')->firstOrFail();

        // Gett all job ids
        $jobids = Job::pluck('id')->toArray();

        // Randomly select jobs to book mark
        $randomJobIds = array_rand($jobids, 3);

        // Attach the selected jobs as bookmarks for the test user
        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedJobs()->attach($jobids[$jobId]);
        }
    }
}
