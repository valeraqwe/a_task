<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Http;

class SearchRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'q' => 'required|string',
        ];
    }

    public function searchTVMaze(): array
    {
        $query = $this->query('q');

        $response = Http::get("http://api.tvmaze.com/search/shows?q={$query}");

        if ($response->failed()) {
            return ['error' => 'Failed to fetch data from TVMaze'];
        }

        $results = collect($response->json())->filter(function ($show) use ($query) {
            return strcasecmp($show['show']['name'], $query) === 0;
        });

        return $results->values()->toArray();
    }
}
