<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class BlogGeneratorService
{
    protected $endpoint = 'https://api.openai.com/v1/responses';
    protected $imageEndpoint = 'https://api.openai.com/v1/images/generations';
    
    

    public function generate(string $topic, string $tone = 'Professional', int $length = 1000): ?array
    {
        
        $sqlprompt = DB::table('tbl_prompt')->first();
        $tone =$sqlprompt->tone;
        $length = $sqlprompt->length;
        $prompt_content = $sqlprompt->prompt;
        
        //echo "hello";
        ///die;
        
        
        $prompt = "Write a {$length}-word SEO optimized blog post about '{$topic}'.
Tone: {$tone}.
Include:
   ".$prompt_content." ";

        $response = Http::withToken(config('services.openai.key'))
            ->post($this->endpoint, [
                'model' => 'gpt-4.1-mini',
                'input' => $prompt,
            ]);

        if ($response->failed()) {
            throw new \Exception('OpenAI API Error: ' . $response->body());
        }

        $data = $response->json();
        $contentText = $data['output'][0]['content'][0]['text'] ?? null;

       
        $imagePrompt = "Create a high-quality featured image for a blog about '{$topic}', professional style, clear, vibrant";

        $imageResponse = Http::withToken(config('services.openai.key'))
            ->post($this->imageEndpoint, [
                'model' => 'gpt-image-1',
                'prompt' => $imagePrompt,
                'size' => '1024x1024',
            ]);

        if ($imageResponse->failed()) {
            throw new \Exception('OpenAI Image API Error: ' . $imageResponse->body());
        }

        $imageUrl = $imageResponse->json()['data'][0]['url'] ?? null;

        return [
            'content' => $contentText,
            'featured_image' => $imageUrl,
        ];
    }
}