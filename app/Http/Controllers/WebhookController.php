<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // You can add authentication checks here if needed
        // Example: if ($request->header('X-Hub-Signature') !== 'your-signature') { return response('Unauthorized', 401); }

        // Execute the git pull command
        $output = null;
        $returnVar = null;

        // Change directory to your Laravel application folder
        $path = '/var/www/dulce/'; // Change this to your Laravel project path

        // Run the git pull command
        exec("cd $path && git pull origin main 2>&1", $output, $returnVar);

        // Log the output for debugging
        Log::info('Git Pull Output: ', $output);
        // Check for errors
        if ($returnVar !== 0) {
            Log::error('Git Pull Error: ', $output);
            return response('Failed to pull the repository', 500);
        }
        return response('Repository updated successfully', 200);
    }
}
