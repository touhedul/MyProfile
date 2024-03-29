<?php

namespace Database\Seeders;

use App\Models\SkillList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            ['name' => 'Web Development'],
            ['name' => 'Graphic Design'],
            ['name' => 'UI/UX Design'],
            ['name' => 'Mobile App Development'],
            ['name' => 'Content Writing'],
            ['name' => 'Digital Marketing'],
            ['name' => 'Social Media Management'],
            ['name' => 'SEO (Search Engine Optimization)'],
            ['name' => 'Project Management'],
            ['name' => 'Data Analysis'],
            ['name' => 'Software Development'],
            ['name' => 'Photography'],
            ['name' => 'Video Editing'],
            ['name' => 'Copywriting'],
            ['name' => 'Branding'],
            ['name' => 'Illustration'],
            ['name' => 'Animation'],
            ['name' => '3D Modeling'],
            ['name' => 'Game Development'],
            ['name' => 'Motion Graphics'],
            ['name' => 'Blogging'],
            ['name' => 'E-commerce'],
            ['name' => 'WordPress'],
            ['name' => 'Shopify'],
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'JavaScript'],
            ['name' => 'PHP'],
            ['name' => 'Python'],
            ['name' => 'Java'],
            ['name' => 'Ruby on Rails'],
            ['name' => 'React'],
            ['name' => 'Angular'],
            ['name' => 'Vue.js'],
            ['name' => 'Node.js'],
            ['name' => 'Express.js'],
            ['name' => 'Laravel'],
            ['name' => 'Django'],
            ['name' => 'Flask'],
            ['name' => 'Swift'],
            ['name' => 'Kotlin'],
            ['name' => 'Flutter'],
            ['name' => 'React Native'],
            ['name' => 'Xamarin'],
            ['name' => 'Adobe Photoshop'],
            ['name' => 'Adobe Illustrator'],
            ['name' => 'Adobe XD'],
            ['name' => 'Figma'],
            ['name' => 'Sketch'],
            ['name' => 'InVision'],
            ['name' => 'Zeplin'],
            ['name' => 'After Effects'],
            ['name' => 'Premiere Pro'],
            ['name' => 'Final Cut Pro'],
            ['name' => 'Social Media Advertising'],
            ['name' => 'Google Ads'],
            ['name' => 'Facebook Ads'],
            ['name' => 'Instagram Marketing'],
            ['name' => 'Twitter Marketing'],
            ['name' => 'LinkedIn Marketing'],
            ['name' => 'Email Marketing'],
            ['name' => 'Google Analytics'],
            ['name' => 'Data Visualization'],
            ['name' => 'SQL'],
            ['name' => 'MongoDB'],
            ['name' => 'Firebase'],
            ['name' => 'API Development'],
            ['name' => 'RESTful APIs'],
            ['name' => 'GraphQL'],
            ['name' => 'Docker'],
            ['name' => 'Kubernetes'],
            ['name' => 'CI/CD'],
            ['name' => 'Git'],
            ['name' => 'GitHub'],
            ['name' => 'Bitbucket'],
            ['name' => 'Jira'],
            ['name' => 'Trello'],
            ['name' => 'Slack'],
            ['name' => 'Microsoft Office'],
            ['name' => 'Google Workspace'],
            ['name' => 'Project Planning'],
            ['name' => 'Agile Methodology'],
            ['name' => 'Scrum'],
            ['name' => 'Kanban'],
            ['name' => 'Customer Support'],
            ['name' => 'CRM (Customer Relationship Management)'],
            ['name' => 'Sales Funnel'],
            ['name' => 'Cold Calling'],
            ['name' => 'Negotiation'],
            ['name' => 'Public Speaking'],
            ['name' => 'Leadership'],
            ['name' => 'Time Management'],
            ['name' => 'Problem Solving'],
            ['name' => 'Critical Thinking'],
            ['name' => 'Emotional Intelligence'],
            ['name' => 'Conflict Resolution'],
            ['name' => 'Networking'],
            ['name' => 'Teamwork'],
            ['name' => 'Entrepreneurship'],
            ['name' => 'Financial Management'],
            ['name' => 'Business Analysis'],
            ['name' => 'Market Research'],
            ['name' => 'A/B Testing'],
            ['name' => 'Usability Testing'],
            ['name' => 'User Research'],
            ['name' => 'Conversion Optimization'],
            ['name' => 'UI/UX Prototyping'],
            ['name' => 'Responsive Design'],
            ['name' => 'Augmented Reality (AR)'],
            ['name' => 'Virtual Reality (VR)'],
            ['name' => 'Blockchain Development'],
            ['name' => 'Cryptocurrency'],
            ['name' => 'Smart Contracts'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Penetration Testing'],
            ['name' => 'Ethical Hacking'],
            ['name' => 'Data Science'],
            ['name' => 'Machine Learning'],
            ['name' => 'Artificial Intelligence'],
            ['name' => 'Natural Language Processing'],
            ['name' => 'Big Data Analytics'],
            ['name' => 'Business Intelligence'],
            ['name' => 'Cloud Computing'],
            ['name' => 'AWS (Amazon Web Services)'],
            ['name' => 'Microsoft Azure'],
            ['name' => 'Google Cloud Platform'],
            ['name' => 'DevOps'],
            ['name' => 'Linux System Administration'],
            ['name' => 'Network Administration'],
            ['name' => 'Internet of Things (IoT)'],
            ['name' => 'UI/UX Evaluation'],
            ['name' => 'Typography'],
            ['name' => 'Color Theory'],
            ['name' => 'Brand Identity Design'],
            ['name' => 'Icon Design'],
            ['name' => 'Print Design'],
            ['name' => 'Packaging Design'],
            ['name' => 'Motion Design'],
            ['name' => 'Podcasting'],
            ['name' => 'Voiceover'],
            ['name' => 'Public Relations'],
            ['name' => 'Crisis Management'],
            ['name' => 'Influencer Marketing'],
            ['name' => 'Event Planning'],
            ['name' => 'Public Speaking'],
            ['name' => 'Blog Monetization'],
            ['name' => 'Affiliate Marketing'],
            ['name' => 'Stock Market Trading'],
            ['name' => 'Real Estate Investing'],
            ['name' => 'Personal Finance'],
            ['name' => 'Cryptocurrency Trading'],
            ['name' => 'Forex Trading'],
            ['name' => 'Supply Chain Management'],
            ['name' => 'Quality Assurance'],
            ['name' => 'Continuous Integration'],
            ['name' => 'User Acceptance Testing (UAT)'],
            ['name' => 'Virtual Assistant'],
            ['name' => 'Online Tutoring'],
            ['name' => 'Language Translation'],
            ['name' => 'Creative Writing'],
            ['name' => 'Technical Writing'],
            ['name' => 'Resume Writing'],
            ['name' => 'Ghostwriting'],
            ['name' => 'Bookkeeping'],
            ['name' => 'Tax Preparation'],
            ['name' => 'Legal Research'],
            ['name' => 'Contract Law'],
            ['name' => 'Employment Law'],
            ['name' => 'Family Law'],
            ['name' => 'Intellectual Property Law'],
            ['name' => 'Environmental Law'],
            ['name' => 'Criminal Law'],
            ['name' => 'Immigration Law'],
            ['name' => 'Health and Wellness Coaching'],
            ['name' => 'Personal Training'],
            ['name' => 'Yoga Instruction'],
            ['name' => 'Nutrition Consulting'],
            ['name' => 'Life Coaching'],
            ['name' => 'Mindfulness Meditation'],
            ['name' => 'Circus Arts'],
            ['name' => 'Fire Dancing'],
            ['name' => 'Balloon Sculpting'],
            ['name' => 'Puppetry'],
            ['name' => 'Ventriloquism'],
            ['name' => 'Sword Swallowing'],
            ['name' => 'Escape Artistry'],
            ['name' => 'Lock Picking'],
            ['name' => 'Origami'],
            ['name' => 'Sand Sculpting'],
            ['name' => 'Beekeeping'],
            ['name' => 'Cheese Making'],
            ['name' => 'Wine Tasting'],
            ['name' => 'Mixology'],
            ['name' => 'Tea Blending'],
            ['name' => 'Urban Gardening'],
            ['name' => 'Bonsai Cultivation'],
            ['name' => 'Soap Making'],
            ['name' => 'Candle Making'],
            ['name' => 'Leatherworking'],
            ['name' => 'Archery'],
            ['name' => 'Rock Climbing'],
            ['name' => 'Parkour'],
            ['name' => 'Ice Sculpting'],
            ['name' => 'Synchronized Swimming'],
            ['name' => 'Capoeira'],
            ['name' => 'Street Art'],
            ['name' => 'Hula Hooping'],
            ['name' => 'Fermentation'],
            ['name' => 'Aquaponics'],
            ['name' => 'Perfume Making'],
            ['name' => 'Beekeeping'],
            ['name' => 'Astrology'],
            ['name' => 'Tarot Reading'],
            ['name' => 'Feng Shui'],
            ['name' => 'Geocaching'],
            ['name' => 'Foraging'],
            ['name' => 'Morse Code'],
            ['name' => 'Sign Language'],
            ['name' => 'Juggling'],
            ['name' => 'Cartomancy (Card Reading)'],
            ['name' => 'Gardening Design'],
            ['name' => 'Scuba Diving'],
            ['name' => 'Kite Surfing'],
            ['name' => 'Sustainable Living'],
        ];

        $skills = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $skills);

        SkillList::insert($skills);
    }
}
