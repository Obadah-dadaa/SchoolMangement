<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'system_administrator' => [
            'parents' => 'c,r,u,d',
            'grades' => 'c,r,u,d',
            'sections' => 'c,r,u,d',
            'students' => 'r,u,d',
            'teacher' => 'c,r,u,d',
            'consults' => 'c,r,u,d',
            'schedules' => 'c,r,u,d',
            'exams' => 'c,r,u,d',
            'absence' => 'r,u',
            'profile' => 'r,u'
        ],
        'teacher' => [
            'students' => 'r,u',
            'exams' => 'r,u',
            'profile' => 'r,u'
        ],
        'parent' => [
            'profile' => 'r,u',
            'absence' => 'r',
            'financialFees' => 'r',
            'schedules' => 'r',
            'students' => 'r',
            'teacher' => 'r',


        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
