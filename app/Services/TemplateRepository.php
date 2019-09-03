<?php namespace App\Services;

use Chumper\Zipper\Zipper;
use Illuminate\Filesystem\Filesystem;

class TemplateRepository
{
    /**
     * @var string
     */
    private $templatesPath;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * TemplateRepository constructor.
     *
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->templatesPath = public_path('builder/templates');
    }

    /**
     * Create a new template.
     *
     * @param array $params
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Exception
     */
    public function create($params)
    {
        $name = isset($params['name']) ? $params['name'] : $params['display_name'];
        $this->update($name, $params);
    }

    /**
     * Update template matching specified name.
     *
     * @param string $name
     * @param array $params
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Exception
     */
    public function update($name, $params)
    {
        $name = str_slug($name);
        $templatePath = "$this->templatesPath/$name";
        
        //extract template files
        if (isset($params['template'])) {
            $zipper = new Zipper;
            $zipper->make($params['template']->getRealPath())->extractTo($templatePath);
           
            $zipper->close();
        }

        //load config file if it exists
        $configPath = "$this->templatesPath/$name/config.json";
        $config = [];
        if ($this->filesystem->exists($configPath)) {
            $config = json_decode($this->filesystem->get($configPath), true);
        }

        //update config file
        foreach (array_except($params, ['template', 'thumbnail']) as $key => $value) {
            $config[$key] = $value;
        }

        $this->filesystem->put($configPath, json_encode($config, JSON_PRETTY_PRINT));

        //update thumbnail
        if (isset($params['thumbnail'])) {
            $this->filesystem->put("$this->templatesPath/$name/thumbnail.png", file_get_contents($params['thumbnail']));
        }
    }

    /**
     * Delete specified templates.
     *
     * @param array $names
     */
    public function delete($names)
    {
        foreach ($names as $name) {
            $this->filesystem->deleteDirectory("$this->templatesPath/$name");
        }
    }
}