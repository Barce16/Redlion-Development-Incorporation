<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:5048'
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $imageName = time().'_'.$image->getClientOriginalName();

                $resizedImage = Image::make($image)
                    ->resize(1200, 800, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('jpg', 80);

                Storage::put("public/projects/$imageName", $resizedImage);

                ProjectImage::create([
                    'project_id' => $project->id,
                    'image_path' => "projects/$imageName"
                ]);
            }
        }

        return redirect()->back()->with('success', 'Project Created Successfully');
    }
}
