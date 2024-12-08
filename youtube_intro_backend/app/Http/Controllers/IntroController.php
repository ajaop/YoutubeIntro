<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Str;

class IntroController extends Controller
{
    public function generateIntro(Request $request)
    {
        // Ensure the file is uploaded
        if (!$request->hasFile('video')) {
            return response()->json(['error' => 'No video file provided'], 400);
        }

        $video = $request->file('video');
        $videoPath = $video->getPathName();

        // Step 1: Get transcript using Python script
        try {
            // Make a POST request to the Python worker API (Flask API)
            $response = Http::timeout(60)->post('http://127.0.0.1:5000/get-transcript', [
                'video_url' => $videoPath
            ]);

            if ($response->successful()) {
                $transcript = $response->json()['transcript'];
            } else {
                return response()->json(['error' => $response->json()['error'] ?? 'Failed to fetch transcript.'], 500);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to extract transcript: ' . $e->getMessage()], 500);
        }

        //Step 2: Generate intro using OpenAI
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a creative assistant skilled in writing engaging YouTube intros.'],
                    ['role' => 'user', 'content' => "Write a catchy YouTube intro based on this transcript:\n\n$transcript"],
                ],
            ]);

            $data = $response->json();
            $intro = $data['choices'][0]['message']['content'] ?? 'Failed to generate intro';

            return response()->json(['intro' => $intro], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error communicating with OpenAI: ' . $e->getMessage()], 500);
        }
    }
}
