<?php

namespace NormanHuth\HelpersLaravel\Spatie\Tags;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use NormanHuth\HelpersLaravel\Spatie\Tags\Tag;

class TagsFieldController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = resolve(config('tags.tag_model', Tag::class))->query();

        if ($request->input('filter.containing') !== null) {
            $query->containing($request['filter']['containing']);
        }

        if ($request->has('filter.type')) {
            $query->where('type', $request['filter']['type']);
        }

        if ($request->has('limit')) {
            $query->limit($request['limit']);
        }

        $sorted = $query->get()->sortBy(fn ($tag) => strtolower($tag->name))->values();

        return $sorted->map(fn ($tag) => $tag->name);
    }
}
