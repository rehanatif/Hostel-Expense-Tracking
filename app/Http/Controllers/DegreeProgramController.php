<?php

namespace App\Http\Controllers;

use App\Models\DegreeProgram;
use Illuminate\Http\Request;

class DegreeProgramController extends Controller
{
    private $degreeProgram;

    public function __construct(DegreeProgram $degreeProgram)
    {
        $this->degreeProgram = $degreeProgram;
        // Constructor logic if needed
    }
    public function index(Request $request)
    {
        // Logic for handling degree programs index
    }

    public function create(Request $request)
    {
        // Logic for creating a new degree program
    }

    public function list(Request $request)
    {
        $list = $this->degreeProgram->all();

        parent::setResponse(true, 'Degree Programs fetched successfully', $list);
        return parent::getResponse();
    }
}
