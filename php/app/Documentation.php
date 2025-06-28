<?php

namespace App\Providers;

use File;

class Documentation
{
    /**
     * Get the documentation for the application.
     *
     * @return array
     */
    public static function get()
    {
        $docs = [];
        $files = File::allFiles(base_path('docs'));

        foreach ($files as $file) {
            $path = $file->getRelativePathname();
            $content = File::get($file->getRealPath());
            $docs[$path] = [
                'content' => $content,
                'last_modified' => $file->getMTime(),
            ];
        }

        return $docs;
    }

    protected function path($file)
    {
        $file = str_ends_with($file, '.md') ? base_path('docs/') . $file : $file;
        $path = base_path($file);
        if (!file_exists($path)) {
            throw new \Exception("Documentation file not found: {$file}");
        }
        return $path;
    }

    protected function replaceLinks($context)
    {
        return str_replace(
            ['[', ']', '(', ')'],
            ['<a href="', '">', '" target="_blank">', '</a>'],
            $context
        );
    }
}
