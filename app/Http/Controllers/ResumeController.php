<?php

namespace App\Http\Controllers;

use App\DataObjects\Resume;
use App\Services\ResumeService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function __construct(private readonly ResumeService $resumeService ){}

    public function index()
    {
        return view('resume', ['resume' => $this->resumeService->get_resume()]);
    }

    public  function download():Response
    {
        $resume = $this->resumeService->get_resume();
        
        $pdf = Pdf::loadView('resume',['resume'=>$resume]);

        return $pdf->download($resume->basics->name . 'Resume.pdf');
    }
}
