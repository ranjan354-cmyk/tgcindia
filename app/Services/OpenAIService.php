<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    protected $endpoint = 'https://api.openai.com/v1/responses';

    public function generate($prompt)
    {
        $response = Http::withToken(config('services.openai.key'))
            ->post($this->endpoint, [
                'model' => 'gpt-4.1-mini',
                'input' => $prompt,
            ]);

        if ($response->failed()) {
            throw new \Exception('OpenAI API Error: ' . $response->body());
        }

        $data = $response->json();

        return isset($data['output'][0]['content'][0]['text'])
            ? $data['output'][0]['content'][0]['text']
            : null;
    }
}