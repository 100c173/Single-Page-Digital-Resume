<?php

namespace App\Services;

use App\DataObjects\Resume;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeService
{
    public function get_resume(): Resume
    {
        $resume = Cache::remember('resume', now()->addDay(), function () {
            $resume = Storage::disk('resumes')->get('resume.json');
            $resumeData = json_decode($resume, true);
            return Resume::fromArray($resumeData);
        });
        return $resume;
    }

}
