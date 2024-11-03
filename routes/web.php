<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello',
        'name' => 'Aslıhan İkiel'
    ]);
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id'=> 1,
                'title'=>'Software Developer',
                'salary' =>'$100.000'
            ],
            [
                'id' => 2,
                'title'=>'Junior Developer',
                'salary' =>'$50.000'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $jobs = [
        [
            'id' => 1,
            'title' => 'Software Developer',
            'salary' => '$100,000',
        ],
        [
            'id' => 2,
            'title' => 'Junior Developer',
            'salary' => '$50,000',
        ],
    ];
    
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // Arr::first fonksiyonunu kullanarak, verilen ID'ye sahip olan ilk ilanı bulur.
    // fn($job) => $job['id'] == $id ifadesi, her ilanının ID'sini kontrol eder
    // ve eşleşme bulduğunda o ilanı döner.
    
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
