<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use Auth;

class ProjectsController extends Controller
{
	public function index()
	{
		return view('projects.index');
	}

	public function create()
	{
		return view('projects.create');
	}

	public function submit(Request $request)
	{
		$request->validate([
			'title' => 'required|max:255',
			'description' => 'required',
		]);

		$project = new Projects;

        $project->title = $request['title'];
        $project->description = $request['description'];
        $project->end_date = $request['end_date'];
        $project->price = $request['price'];
        $project->active = 1;
        if (isset($request['remote'])) {
            $project->remote = $request['remote'];
        }
        $project->user_id = Auth::id();

        $message = $request->user()->projects()->save($project) ? 'Проект отправлен на модерацию успешно!' : 'Произошла ошыбка!';

        // $cats_id = $request['cat_ids'];
        // foreach ($cats_id as $cat_id) :
        //     $project->categories()->attach($cat_id);
        // endforeach;
        // find all users
//        $users = User::all();
//
//        foreach ($users as $user) :
//            if ($user->hasRole('admin')) :
//                // send notification to all admins
//                $user->notify(new NotifyAdminsAboutNewProject($project));
//            endif;
//        endforeach;
        return redirect()->back()->with(['message' => $message]);
	}

	public function show($id)
	{
		$this->data['project'] = Projects::findOrFail($id);

		return view('projects.show', $this->data);
	}
}
