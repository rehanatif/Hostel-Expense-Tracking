<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Translation\Translator;

class CustomTranslator extends Translator
{
    protected $loader, $locale, $fallback;

    public function __construct($loader, $locale, $fallback)
    {
        parent::__construct($loader, $locale); // Proper parent init
        $this->loader = $loader;
        $this->locale = $locale;
        $this->fallback = $fallback;
    }

    public function get($key, array $replace = [], $locale = null, $fallback = true)
    {
        $locale = session('locale', $locale ?? $this->locale);

        try {
            $translation = parent::get($key, $replace, $locale, $fallback);
        } catch (\Throwable $e) {
            // Fallback in case of syntax or other errors
            return $key;
        }

        if (app()->environment('local', 'development')) {
            if ($translation === $key) {
                $isFileKeyFormat = preg_match('/^[a-zA-Z0-9_]+\.[a-z A-Z 0-9 _ . ? ! - , & | : # ) (]+$/', $key);
                $parts = explode('.', $key, 2);

                $file = isset($parts[1]) ? $parts[0] : 'general';
                $actualKey = $parts[1] ?? $parts[0];
                $path = base_path("resources/lang/{$locale}/{$file}.php");

                // Ensure the directory exists
                $directory = dirname($path);
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }

                // Create the file if it doesn't exist
                if (!file_exists($path)) {
                    file_put_contents($path, "<?php\n\nreturn [\n];");
                }

                // Load existing translations safely
                try {
                    $translations = include $path;
                    if (!is_array($translations)) {
                        $translations = [];
                    }
                } catch (\Throwable $e) {
                    $translations = [];
                }

                // Add the missing key if not already added
                if (!array_key_exists($actualKey, $translations)) {
                    $translations[$actualKey] = $actualKey;

                    $content = "<?php\n\nreturn [\n";
                    foreach ($translations as $k => $v) {
                        $content .= "    '" . addslashes($k) . "' => '" . addslashes($v) . "',\n";
                    }
                    $content .= "];";

                    file_put_contents($path, $content);
                }
            }
        }

        return $translation ?? $key;
    }
}
