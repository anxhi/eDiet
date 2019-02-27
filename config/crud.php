<?php
    return [
        'editables' => [
            'users' => [
                'name' => 'text',
                'username' => 'text',
                'role' => 'text'
            ],
            'foods' => [
                'name' => 'text',
                'calories' => 'number',
                'category' => 'text',
            ],
            'diets' => [
                'name' => 'text',
                'duration' => 'number',
                'isVegan' => 'checkbox',
                'isDiaryFree' => 'checkbox',
                'isGlutenFree' => 'checkbox',
            ]
        ]
    ];
