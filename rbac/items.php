<?php

return [
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'user',
        ],
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'createPost',
        ],
    ],
    'createPost' => [
        'type' => 2,
        'description' => 'Create a post',
    ],
    'updatePost' => [
        'type' => 2,
        'description' => 'Update post',
    ],
];
