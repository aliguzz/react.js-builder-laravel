<?php namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

class ThemesLoader
{
    /**
     * @var string
     */
    public $themesPath;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    const DEFAULT_THUMBNAIL = 'client/assets/images/default_project_thumbnail.png';

    /**
     * ThemesLoader constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->themesPath = public_path('builder/themes');
        $this->filesystem = $filesystem;
    }

    /**
     * Load all available themes.
     *
     * @return Collection
     */
    public function loadAll()
    {
        $paths = $this->filesystem->directories($this->themesPath);

        return collect($paths)->map(function($path) {
            $name = basename($path);

            return [
                'name' => $name,
                'thumbnail' => $this->getThemeImagePath($name, self::DEFAULT_THUMBNAIL)
            ];
        });
    }

    /**
     * Get template image path or default.
     *
     * @param string $name
     * @param string $default
     * @return string
     */
    private function getThemeImagePath($name, $default = '')
    {
        $path = "$this->themesPath/$name/image.png";

        if ($this->filesystem->exists($path)) {
            return str_replace(public_path(DIRECTORY_SEPARATOR), '', $path);
        }

        return $default;
    }
}