<?php

use Illuminate\Database\Seeder;

class projects_for_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([

            ['title' => 'html',
            'subtitle' => 'Basics HTML',
            'image' => 'https://miro.medium.com/max/498/1*5gJzummAqpBDGATo0fjU6Q.jpeg',
            'description' => 'Hypertext Markup Language (HTML) is the standard markup language for documents designed to be displayed in a web browser',
            'link' => 'https://brainster.co/'],

            ['title' => 'CSS',
            'subtitle' => 'Learn CSS',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/1200px-CSS3_logo_and_wordmark.svg.png',
            'description' => 'Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML.',
            'link' => 'https://brainster.co/'],

            ['title' => 'JavaScript',
            'subtitle' => 'Introducing JavaScript',
            'image' => 'https://www.w3schools.com/whatis/img_js.png',
            'description' => ' JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.',
            'link' => 'https://brainster.co/'],

            ['title' => 'Mysql',
            'subtitle' => 'MariaDB',
            'image' => 'https://d1.awsstatic.com/asset-repository/products/amazon-rds/1024px-MySQL.ff87215b43fd7292af172e2a5d9b844217262571.png',
            'description' => 'MySQL Database Service is a fully managed database service to deploy cloud-native applications.',
            'link' => 'https://brainster.co/'],

            ['title' => 'PHP',
            'subtitle' => 'PHP crash course',
            'image' => 'https://www.orangemantra.com/blog/wp-content/uploads/2015/12/PHP-Development-Company.jpg',
            'description' => 'PHP is a popular general-purpose scripting language that is especially suited to web development. Fast, flexible and pragmatic.',
            'link' => 'https://brainster.co/'],

            ['title' => 'Database',
            'subtitle' => 'Learnign Database',
            'image' => 'https://penmypaper.com/blog/wp-content/uploads/2020/05/Database-management-system.png',
            'description' => 'lA database is an organized collection of data, generally stored and accessed electronically from a computer system. ',
            'link' => 'https://brainster.co/'],

            ['title' => 'Laravel',
            'subtitle' => 'Laravel for beginners',
            'image' => 'https://surround-bg.com/wp-content/uploads/2018/10/laravel-logo.png',
            'description' => 'Laravel is a web application framework with expressive, elegant syntax. We have already laid the foundation — freeing you to create without sweating the small ...',
            'link' => 'https://brainster.co/'],

            ['title' => 'Java',
            'subtitle' => 'Free course Java',
            'image' => 'https://sdtimes.com/wp-content/uploads/2019/03/jW4dnFtA_400x400.jpg',
            'description' => 'Get started with Java today.',
            'link' => 'https://brainster.co/'],

            ['title' => 'jQuery',
            'subtitle' => 'Learn Query',
            'image' => 'https://cdn-images-1.medium.com/max/285/1*QR2SBNwG75LyY5uwqWpN3A.png',
            'description' => 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. ',
            'link' => 'https://brainster.co/'],

        ]);
    }
}
