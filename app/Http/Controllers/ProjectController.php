<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Halaman publik untuk menampilkan project
     */
    public function index()
    {
        $projects = Project::where('visible', true)
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('portfolio.projects', compact('projects'));
    }

    /**
     * Halaman admin untuk list semua project
     */
    public function adminIndex()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return view('projects.admin.index', compact('projects'));
    }

    /**
     * Form tambah project
     */
    public function create()
    {
        return view('projects.admin.create');
    }

    /**
     * Simpan project baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'tech'        => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'repo_url'    => 'nullable|url',
            'demo_url'    => 'nullable|url',
            'visible'     => 'boolean',
            'file'        => 'nullable|file|mimes:zip,pdf,docx,txt|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    /**
     * Form edit project
     */
    public function edit(Project $project)
    {
        return view('projects.admin.edit', compact('project'));
    }

    /**
     * Update project
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'tech'        => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'repo_url'    => 'nullable|url',
            'demo_url'    => 'nullable|url',
            'visible'     => 'boolean',
            'file'        => 'nullable|file|mimes:zip,pdf,docx,txt|max:10240',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    /**
     * Hapus project
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus!');
    }
}
