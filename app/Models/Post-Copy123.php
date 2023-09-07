<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function find($slug)
    {
        return static::alli()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post =  static::find($slug);

        if (! $post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }

    public static function alli()
    {
        return cache()->rememberForever('posts.alli', function() {
            return collect(File::files(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                ))->sortBy('date');
        });

        // foreach ($files as $file) {
        //     $document = YamlFrontMatter::parseFile($file);

        //     $posts[] = new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug,
        //     );
        // }

        // $files = File::files(resource_path("posts/"));

        // return array_map(fn ($file) => $file->getContents(), $files);
    }
}
