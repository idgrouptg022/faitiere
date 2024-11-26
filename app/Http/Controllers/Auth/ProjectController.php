<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\Project;
use App\Enums\ProjectTypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(string $projectType)
    {
        if (!in_array($projectType, array_map(fn($case) => $case->value, ProjectTypes::cases()))) {
            abort(404);
        }

        $projectTypeCase = ProjectTypes::from($projectType);

        $projectTypeValue = $projectTypeCase->value;

        switch ($projectTypeValue) {
            case 'plaidoyer':
                $projects = Project::where("type", ProjectTypes::Plaidoyer)->latest()->get();
                return view('auths.projets.plaidoyers', compact("projects"));

            case 'pending':
                $projects = Project::where("type", ProjectTypes::Pending)->latest()->get();
                return view('auths.projets.pending', compact("projects"));

            case 'complete':
                $projects = Project::where("type", ProjectTypes::Complete)->latest()->get();
                return view('auths.projets.complete', compact("projects"));

            default:
                abort(404);
                break;
        }

    }

    public function store(ProjectRequest $request, string $projectType): RedirectResponse
    {
        if (!in_array($projectType, array_map(fn($case) => $case->value, ProjectTypes::cases()))) {
            abort(500);
        }

        $fields = $request->validated();

        if (!$request->hasFile("filepath")) {
            return redirect()->back()->withErrors(['filepath' => "Veuillez choisir un fichier."]);
        }

        $projectTypeCase = ProjectTypes::from($projectType);

        $projectTypeValue = $projectTypeCase->value;

        $filePath = $request->file('filepath')->store('projects/' . $projectTypeValue , 'public');

        $fields['filepath'] = $filePath;

        $fields['type'] = $projectTypeValue;

        Project::create($fields);

        return redirect()->back()->with('success', 'Opération effectuée avec succès');
    }

    public function update(ProjectRequest $request, string $projectType, Project $project): RedirectResponse
    {
        if (!in_array($projectType, array_map(fn($case) => $case->value, ProjectTypes::cases()))) {
            abort(500);
        }

        $fields = $request->validated();

        if ($request->hasFile("filepath")) {
            $oldFile = $project->filepath;

            $filePath = $request->file('filepath')->store('projects/'. $projectType, 'public');

            $fields['filepath'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $project->update($fields);

        return redirect()->back()->with('success', 'Opération effectuée avec succès');
    }

    public function destroy(string $projectType, Project $project): RedirectResponse
    {
        if (!in_array($projectType, array_map(fn($case) => $case->value, ProjectTypes::cases()))) {
            abort(500);
        }

        try {
            if (Storage::disk("public")->exists($project->filepath)) {
                Storage::disk("public")->delete($project->filepath);
            }
            $project->delete();
            return redirect()->back()->with('success', 'Opération effectuée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['title' => 'Opération de suppression échouée']);
        }
    }
}
