<?php

namespace App\Http\Controllers;

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;


class GeminiController extends Controller
{
    function respond($message)
    {
        $client = new Client("GEMINI_API_KEY_HERE");
        $response = $client->geminiPro()->generateContent(
            new TextPart($message),
        );
        $text = $response->text();
        if (strlen($text) > 1960) {
            // Trim the sentence to 200 characters and add an ellipsis
            $truncatedSentence = substr($text, 0, 1950) . '...Check The Internet For more Information';
        } else {
            // If the sentence is already 200 characters or less, no need for truncation
            $truncatedSentence = $text;
        }


       return $truncatedSentence;
    }
}
