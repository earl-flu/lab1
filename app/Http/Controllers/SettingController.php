<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use File;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all(); // Retrieve all settings
        return Inertia::render('Settings/Index', [
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Settings/CreateSettings', []);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $this->cleanFileInputs($request);

        $validatedData = $request->validate([
            'hospital_name' => 'required|string|max:255',
            'hospital_address' => 'nullable|string|max:255',
            'esig_style' => 'nullable|string|max:255',
            'hospital_tagline' => 'nullable|string|max:255',
            'hospital_email' => 'required|email|max:255',
            'hospital_contact_number' => 'nullable|string|max:20',
            'pathologist_name' => 'required|string|max:255',
            'pathologist_license_number' => 'required|string|max:255',
            'pathologist_esignature' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            'hospital_logo' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        DB::transaction(function () use ($request, $validatedData) {
            $setting = Setting::find(1) ?? new Setting();

            $processedData = $this->processFileUploads($request, $validatedData, $setting);

            // Create or update the settings
            Setting::updateOrCreate(
                ['id' => $setting->id],
                $processedData
            );
        });

        return redirect()->route('settings.create')
            ->with('status', 'Settings updated successfully.');
    }


    private function cleanFileInputs(Request $request): void
    {
        if (is_string($request->hospital_logo)) {
            $request->merge(['hospital_logo' => null]);
        }

        if (is_string($request->pathologist_esignature)) {
            $request->merge(['pathologist_esignature' => null]);
        }
    }

    private function processFileUploads(Request $request, array $validatedData, Setting $setting): array
    {
        // Process pathologist signature
        if ($request->hasFile('pathologist_esignature')) {
            $validatedData['pathologist_esignature'] = $this->handleFileUpload(
                $request,
                'pathologist_esignature',
                'esignatures',
                'pathologist-esignature'
            );
        } else {
            $validatedData['pathologist_esignature'] = $setting->pathologist_esignature;
        }

        // Process hospital logo
        if ($request->hasFile('hospital_logo')) {
            $validatedData['hospital_logo'] = $this->handleFileUpload(
                $request,
                'hospital_logo',
                'logos',
                'hospital-logo'
            );
        } else {
            $validatedData['hospital_logo'] = $setting->hospital_logo;
        }

        return $validatedData;
    }

    // Function to handle file uploads
    private function handleFileUpload($request, $fileKey, $directory, $customNamePrefix)
    {
        if ($request->hasFile($fileKey)) {
            // Generate a custom filename
            $extension = $request->file($fileKey)->getClientOriginalExtension(); // Get the file extension
            $customName =  $customNamePrefix . '.' . $extension; // Create a custom name

            // Store the uploaded image with the custom name
            $filePath = $request->file($fileKey)->storeAs($directory, $customName, 'public');

            // Create directory if it doesn't exist
            if (!File::exists($filePath)) {
                File::makeDirectory($filePath, 0777, true);
            }

            // Delete old file if exists
            $fileWithoutExtension = $filePath . $customNamePrefix;
            foreach (['png', 'jpg', 'jpeg', 'gif', 'bmp', 'svg', 'webp'] as $extension) {
                $file = $fileWithoutExtension . '.' . $extension;
                if (File::exists($file)) {
                    File::delete($file);
                }
            }

            return $filePath; // Return the path to be saved in the database
        }

        return null; // Return null if no file was uploaded
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch the existing settings data by ID
        $setting = Setting::find($id);

        if ($setting) {
            return response()->json($setting);
        }

        return response()->json(null); // Return null if no settings found
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
