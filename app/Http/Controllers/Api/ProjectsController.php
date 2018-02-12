<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Projects;

class ProjectsController extends Controller
{
	public function getProjects()
	{
		return Projects::where(['active' => '1'])->get();
	}
}
