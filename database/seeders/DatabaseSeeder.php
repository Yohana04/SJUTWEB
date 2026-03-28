<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Program;
use App\Models\Staff;
use App\Models\News;
use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Announcement::truncate();
        News::truncate();
        Staff::truncate();
        Program::truncate();
        Department::truncate();
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create admin user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@cict.sjut.ac.tz',
        ]);

        // Create Departments
        $departments = [
            [
                'name' => 'Computer Science',
                'description' => 'Department of Computer Science offers cutting-edge programs in software development, artificial intelligence, and data science.',
                'head_of_department' => 'Dr. John Smith',
                'email' => 'cs@cict.sjut.ac.tz',
                'phone' => '+255 123 456 789'
            ],
            [
                'name' => 'Information Technology',
                'description' => 'Department of Information Technology focuses on network administration, cybersecurity, and IT management.',
                'head_of_department' => 'Dr. Jane Doe',
                'email' => 'it@cict.sjut.ac.tz',
                'phone' => '+255 123 456 790'
            ],
            [
                'name' => 'Information Systems',
                'description' => 'Department of Information Systems combines business knowledge with technical expertise for enterprise solutions.',
                'head_of_department' => 'Dr. Michael Johnson',
                'email' => 'is@cict.sjut.ac.tz',
                'phone' => '+255 123 456 791'
            ]
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        // Create Programs
        $programs = [
            [
                'name' => 'Bachelor of Computer Science',
                'level' => 'Degree',
                'description' => 'A comprehensive 4-year program covering software development, algorithms, data structures, and computer systems.',
                'department_id' => 1,
                'duration_years' => 4,
                'code' => 'BCS-001'
            ],
            [
                'name' => 'Bachelor of Information Technology',
                'level' => 'Degree',
                'description' => 'Focus on network administration, cybersecurity, and IT infrastructure management.',
                'department_id' => 2,
                'duration_years' => 4,
                'code' => 'BIT-001'
            ],
            [
                'name' => 'Diploma in Software Development',
                'level' => 'Diploma',
                'description' => '2-year intensive program in modern software development practices and technologies.',
                'department_id' => 1,
                'duration_years' => 2,
                'code' => 'DSD-001'
            ],
            [
                'name' => 'Master of Computer Science',
                'level' => 'Masters',
                'description' => 'Advanced research-oriented program for computer science professionals.',
                'department_id' => 1,
                'duration_years' => 2,
                'code' => 'MCS-001'
            ]
        ];

        foreach ($programs as $prog) {
            Program::create($prog);
        }

        // Create Staff
        $staff = [
            [
                'name' => 'Dr. John Smith',
                'title' => 'Professor & Head of Department',
                'email' => 'john.smith@cict.sjut.ac.tz',
                'phone' => '+255 123 456 789',
                'bio' => 'Expert in Artificial Intelligence and Machine Learning with over 15 years of experience.',
                'department_id' => 1,
                'status' => 'active'
            ],
            [
                'name' => 'Dr. Jane Doe',
                'title' => 'Associate Professor',
                'email' => 'jane.doe@cict.sjut.ac.tz',
                'phone' => '+255 123 456 790',
                'bio' => 'Specialist in Cybersecurity and Network Administration.',
                'department_id' => 2,
                'status' => 'active'
            ],
            [
                'name' => 'Dr. Michael Johnson',
                'title' => 'Assistant Professor',
                'email' => 'michael.j@cict.sjut.ac.tz',
                'phone' => '+255 123 456 791',
                'bio' => 'Expert in Database Systems and Enterprise Architecture.',
                'department_id' => 3,
                'status' => 'active'
            ]
        ];

        foreach ($staff as $s) {
            Staff::create($s);
        }

        // Create Announcements
        $announcements = [
            [
                'title' => 'New Academic Year 2024/2025 Registration Open',
                'content' => 'Registration for the 2024/2025 academic year is now open. All prospective students are encouraged to apply early. Deadline for applications is August 31, 2024.',
                'type' => 'Academic',
                'status' => 'active',
                'published_at' => now(),
                'expires_at' => now()->addMonths(2)
            ],
            [
                'title' => 'CICT Annual Research Symposium',
                'content' => 'Join us for our annual research symposium featuring presentations from faculty and students on cutting-edge ICT topics. Event will be held on September 15, 2024.',
                'type' => 'General',
                'status' => 'active',
                'published_at' => now()->subDays(5),
                'expires_at' => now()->addMonth()
            ],
            [
                'title' => 'Urgent: System Maintenance Notice',
                'content' => 'The university\'s online learning platform will undergo maintenance this weekend from Saturday 10 PM to Sunday 2 AM. Please save your work accordingly.',
                'type' => 'Urgent',
                'status' => 'active',
                'published_at' => now()->subDays(1),
                'expires_at' => now()->addDays(2)
            ]
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }

        // Create News
        $news = [
            [
                'title' => 'CICT Wins National ICT Innovation Award',
                'content' => 'The College of ICT has been recognized for its outstanding contribution to ICT innovation in Tanzania. The award was presented at the National ICT Summit in Dar es Salaam.',
                'slug' => 'cict-wins-national-ict-innovation-award',
                'status' => 'published',
                'published_at' => now()->subDays(3)
            ],
            [
                'title' => 'New Partnership with Tech Industry Leaders',
                'content' => 'CICT has established strategic partnerships with leading technology companies to enhance practical training and internship opportunities for students.',
                'slug' => 'new-partnership-with-tech-industry-leaders',
                'status' => 'published',
                'published_at' => now()->subWeek()
            ],
            [
                'title' => 'Graduation Ceremony 2024',
                'content' => 'The 2024 graduation ceremony will be held on December 15, 2024. Over 200 students from various ICT programs will receive their degrees and diplomas.',
                'slug' => 'graduation-ceremony-2024',
                'status' => 'published',
                'published_at' => now()->subWeeks(2)
            ]
        ];

        foreach ($news as $item) {
            News::create($item);
        }
    }
}
