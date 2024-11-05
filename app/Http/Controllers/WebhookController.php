<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class WebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $secret = env('GITHUB_WEBHOOK_SECRET'); // The secret you set in the GitHub webhook
        $payload = $request->getContent();

        // Calculate the HMAC signature for the payload
        $signature256 = 'sha256=' . hash_hmac('sha256', $payload, $secret);
        $signature = 'sha1=' . hash_hmac('sha1', $payload, $secret);

        // Validate the signature
        if (!$this->isValidSignature($request, $signature256, $signature)) {
            Log::warning('Invalid GitHub webhook request.');
            return response('Unauthorized', 401);
        }

        // Execute the git pull command
        return $this->executeGitPull();
    }

    private function isValidSignature(Request $request, string $signature256, string $signature)
    {
        return hash_equals($signature256, $request->header('X-Hub-Signature-256')) ||
               hash_equals($signature, $request->header('X-Hub-Signature'));
    }

    private function executeGitPull()
    {
        $output = [];
        $returnVar = 0;

        // Define the path to your Laravel application
        $path = '/var/www/dulce/'; // Change this to your Laravel project path

        // Run the git pull command safely
        chdir($path);
        exec('git pull origin main 2>&1', $output, $returnVar);

        // Log the output for debugging
        Log::info('Git Pull Output: ', $output);

        // Check for errors and return appropriate response
        if ($returnVar !== 0) {
            Log::error('Git Pull Error: ', $output);
            return response('Failed to pull the repository', 500);
        }

        return response('Repository updated successfully', 200);
    }
}
