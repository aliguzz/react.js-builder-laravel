<?php namespace App\Services;

use App\Project;
use Auth;
use File;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Storage;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ProjectRepository
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var string
     */
    private $templatesPath;

    /**
     * @var \Illuminate\Filesystem\FilesystemAdapter
     */
    private $storage;

    /**
     * @var TemplateLoader
     */
    private $templateLoader;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * ProjectRepository Constructor.
     *
     * @param TemplateLoader $templateLoader
     * @param Project $project
     * @param Filesystem $filesystem
     */
    public function __construct(TemplateLoader $templateLoader, Project $project, Filesystem $filesystem)
    {
        $this->project = $project;
        $this->storage = Storage::disk('public');
        $this->templateLoader = $templateLoader;
        $this->templatesPath = $templateLoader->templatesPath;
        $this->filesystem = $filesystem;
    }

    /**
     * Find project by specified id.
     *
     * @param int $id
     * @return Project
     */
    public function findOrFail($id)
    {
        return $this->project->findOrFail($id);
    }

    public function load(Project $project)
    {
        $path = $this->getProjectPath($project);
        $pages = $this->loadProjectPages('temp_'.$path . '/desktop');

        $loaded = [
            'model' => $project->toArray(),
            'pages' => $pages,
        ];

        return $loaded;
    }

    /**
     * Get path for the specified project.
     *
     * @param Project $project
     * @return string
     */
    public function getProjectPath(Project $project)
    {
        return 'projects/' . $project->users->first()->id . '/' . $project->uuid;
    }

    /**
     * Get html of specified project's page.
     *
     * @param Project $project
     * @param string$name
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getPageHtml(Project $project, $name)
    {
        if (!$name) {
            $name = 'index';
        }

        $projectPath = $this->getProjectPath($project);

        $name = str_contains($name, '.html') ? $name : "$name.html";

        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(isset($_GET['mobile']) || preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
            $device = 'mobile';
        }else{
            $device = 'desktop';
        }

        $pagePath = "$projectPath/$device/$name";

        if (!$this->storage->exists($pagePath)) {
            $name = $this->loadProjectPages($projectPath)->first()['name'];
            $pagePath = "$projectPath/$device/$name.html";
        }
        return $this->storage->get($pagePath);
    }

    public function update(Project $project, $data, $overrideFiles = true)
    {
        $projectPath = $this->getProjectPath($project);
        $projectPath = 'temp_'.$projectPath.'/'.$data['device'].'/'. $data['currentPage'].'.html';
        $this->storage->put($projectPath, $data['pagehtml']);

        $project->fill([
            'id' => Arr::get($data, 'id', $project->id),
            'forms' => Arr::get($data, 'forms', $project->forms),
            'ind_id' => Arr::get($data, 'ind_id', $project->ind_id),
            'name' => Arr::get($data, 'name', $project->name),
            'theme' => Arr::get($data, 'theme', $project->theme),
            'template' => Arr::get($data, 'template', $project->template),
            'published' => Arr::get($data, 'published', $project->published),
            'framework' => Arr::get($data, 'framework', $project->framework),
            'incrementalValueForAttribute' => Arr::get($data, 'incrementalValueForAttribute', $project->incrementalValueForAttribute),
            'zIndex' => Arr::get($data, 'zIndex', $project->zIndex),
            'styleManager' => Arr::get($data, 'styleManager', $project->styleManager),
            'scales' => Arr::get($data, 'scales', $project->scales),
            'gridline' => Arr::get($data, 'gridline', $project->gridline),
            'impulsiveStuff' => Arr::get($data, 'impulsiveStuff', $project->impulsiveStuff),
            'autoSave' => Arr::get($data, 'autoSave', $project->autoSave),
        ])->save();
    }

    public function create($data)
    {
        $project = $this->project->create([
            'id' => $data['id'],
            'forms' => $data['forms'],
            'ind_id' => $data['ind_id'],
            'name' => $data['name'],
            'template' => $data['template']['name'],
            'uuid' => $data['uuid'],
            'framework' => Arr::get($data, 'framework', 'bootstrap-3'),
        ])->fresh();

        //attach to user
        $project->users()->attach(Auth::user()->id);

        $projectPath = $this->getProjectPath($project);

        $this->applyFramework($projectPath, $project->framework);

        //Temp Work
        $this->applyFramework('temp_'.$projectPath, $project->framework);

        //thumbnail
        $this->storage->put("$projectPath/thumbnail.png", File::get(public_path(TemplateLoader::DEFAULT_THUMBNAIL)));

        //Temp Work
        $this->storage->put('temp_'.$projectPath."/thumbnail.png", File::get(public_path(TemplateLoader::DEFAULT_THUMBNAIL)));

        //custom css
        $this->storage->put("$projectPath/css/styles.css", '');

        //Temp Work
        $this->storage->put('temp_'.$projectPath."/css/styles.css", '');

        //custom js
        $this->storage->put("$projectPath/js/scripts.js", '');

        //Temp Work
        $this->storage->put('temp_'.$projectPath."/js/scripts.js", '');

        //custom elements css
        $this->addCustomElementCss($projectPath, '');

        //Temp Work
        $this->addCustomElementCss('temp_'.$projectPath, '');

        //empty theme
        $this->applyTheme($projectPath, null);

        //Temp Work
        $this->applyTheme('temp_'.$projectPath, null);

        //apply template
        if ($data['template']) {
            $this->applyTemplate($data['template'], $projectPath);
            //Temp Work
            $this->applyTemplate($data['template'],'temp_'.$projectPath);
        }

        //create pages
        if (isset($data['pages'])) {
            $this->updatePages($project, $data['pages']);
            $this->updatePages2($project, $data['pages']);

        }

        return $project;
    }

    /**
     * Delete specified project.
     *
     * @param Project $project
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Project $project)
    {
        $path = $this->getProjectPath($project);
        $this->storage->deleteDirectory($path);
        $project->users()->detach();
        return $project->delete();
    }

    /**
     * Update project pages.
     *
     * @param Project $project
     * @param array $pages
     */
    public function updatePages(Project $project, $pages)
    {
        $projectPath = $this->getProjectPath($project);
        $projectPath = 'temp_'.$projectPath;
        //delete old pages
        collect($this->storage->files($projectPath))->filter(function ($path) {
            return str_contains($path, '.html');
        })->each(function ($path) {
            $this->storage->delete($path);
        });
        // print_r(json_encode($pages));
        //store new pages
        collect($pages['mobile'])->each(function ($page) use ($projectPath) {
            $this->storage->put("$projectPath/mobile/{$page['name']}.html", $page['html']);
        });
        collect($pages['desktop'])->each(function ($page) use ($projectPath) {
            $this->storage->put("$projectPath/desktop/{$page['name']}.html", $page['html']);
        });
    }
    public function updatePages2(Project $project, $pages)
    {
        $projectPath = $this->getProjectPath($project);

        //delete old pages
        collect($this->storage->files($projectPath))->filter(function ($path) {
            return str_contains($path, '.html');
        })->each(function ($path) {
            $this->storage->delete($path);
        });
        // print_r(json_encode($pages));
        //store new pages
        collect($pages['mobile'])->each(function ($page) use ($projectPath) {
            $this->storage->put("$projectPath/mobile/{$page['name']}.html", $page['html']);
        });
        collect($pages['desktop'])->each(function ($page) use ($projectPath) {
            $this->storage->put("$projectPath/desktop/{$page['name']}.html", $page['html']);
        });
    }

    private function applyFramework($projectPath, $framework)
    {
        if (!$framework) {
            return;
        }

        //add framework
        $this->storage->put(
            "$projectPath/css/framework.css",
            $this->getBuilderAsset("frameworks/$framework/styles.min.css")
        );

        $this->storage->put(
            "$projectPath/js/framework.js",
            $this->getBuilderAsset("frameworks/$framework/scripts.min.js")
        );

        //font awesome
        $this->storage->put(
            "$projectPath/css/font-awesome.css",
            $this->getBuilderAsset("css/font-awesome.min.css")
        );

        //fonts
        collect(File::files(public_path("builder/fonts")))->each(function ($path) use ($projectPath) {
            $this->storage->put(
                "$projectPath/fonts/" . basename($path),
                File::get($path)
            );
        });

        //jquery
        $this->storage->put(
            "$projectPath/js/jquery.min.js",
            $this->getBuilderAsset("js/jquery.min.js")
        );
    }

    /**
     * Apply specified theme to the project.
     *
     * @param string $projectPath
     * @param string $themeName
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private function applyTheme($projectPath, $themeName = null)
    {
        $contents = is_null($themeName) ? '' : $this->getBuilderAsset("themes/$themeName/stylesheet.css");
        $this->storage->put("$projectPath/css/theme.css", $contents);
    }

    /**
     * Update project template to specified one.
     *
     * @param Project $project
     * @param string $templateName
     * @param bool $overrideFiles
     * @throws FileNotFoundException
     */
    private function updateTemplate(Project $project, $templateName, $overrideFiles = true)
    {
        $oldTemplatePath = "$this->templatesPath/$templateName";
        $projectPath = $this->getProjectPath($project);
        $template = $this->templateLoader->load($templateName);

        //delete old images
        if ($this->storage->exists("$oldTemplatePath/images")) {
            $paths = Finder::create()->ignoreDotFiles(true)->in("$oldTemplatePath/images");

            collect($paths)->each(function (SplFileInfo $file) use ($projectPath) {
                $path = "$projectPath/images/" . $file->getBasename();

                if (!$this->storage->exists($path)) {
                    return;
                }

                if ($file->isDir()) {
                    $this->storage->deleteDirectory($path);
                } else {
                    $this->storage->delete($path);
                }
            });
        }

        //delete old libraries
        if (isset($template['config']['libraries'])) {
            collect($template['config']['libraries'])->each(function ($library) use ($projectPath) {
                $name = strtolower(kebab_case($library));
                if ($this->storage->exists("$projectPath/js/$name.js")) {
                    $this->storage->delete("$projectPath/js/$name.js");
                }
            });
        }

        //apply new template
        $this->applyTemplate($template, $projectPath, $overrideFiles);
    }

    public function applyTemplate($templateData, $projectPath, $overrideFiles = true)
    {
        $templateName = strtolower(kebab_case($templateData['name']));

        //copy template files recursively
        foreach ($this->filesystem->allFiles("$this->templatesPath/$templateName") as $fileInfo) {
            $filePath = $fileInfo->getRealPath();
            $innerPath = str_replace($this->templatesPath . DIRECTORY_SEPARATOR . $templateName, $projectPath, $filePath);

            if ($this->storage->exists($innerPath) && !$overrideFiles) {
                continue;
            }

            $this->storage->put($innerPath, $this->filesystem->get($filePath));
        }

        //copy template css and js
        $this->storage->put("$projectPath/css/template.css", $templateData['css']);
        $this->storage->put("$projectPath/js/template.js", $templateData['js']);

        //libraries
        if (isset($templateData['config']['libraries'])) {
            collect($templateData['config']['libraries'])->each(function ($library) use ($projectPath) {
                $name = strtolower(kebab_case($library));
                $content = $this->getBuilderAsset("js/libraries/$name.js");
                $this->storage->put("$projectPath/js/$name.js", $content);
            });
        }

        //thumbnail
        $this->storage->put("$projectPath/thumbnail.png", $this->filesystem->get($templateData['thumbnail']));
    }

    /**
     * Load all pages for specified project.
     *
     * @param string $path
     * @return Collection
     */
    private function loadProjectPages($path)
    {
        return collect($this->storage->files($path))->filter(function ($path) {
            return str_contains($path, '.html');
        })->map(function ($path) {
            return basename($path, '.html');
        })->values();
    }

    /**
     * Add specified custom element css to the project.
     *
     * @param string $projectPath
     * @param string $customElementCss
     */
    private function addCustomElementCss($projectPath, $customElementCss)
    {
        $path = "$projectPath/css/custom_elements.css";

        try {
            $contents = $this->storage->get($path);
        } catch (FileNotFoundException $e) {
            $contents = '';
        }

        //if this custom element css is already added, bail
        if ($contents && str_contains($contents, $customElementCss)) {
            return;
        }

        $contents = "$contents\n$customElementCss";

        $this->storage->put($path, $contents);
    }

    /**
     * Get contents of specified builder asset file.
     *
     * @param string $path
     * @return string
     * @throws FileNotFoundException
     */
    private function getBuilderAsset($path)
    {
        $path = strtolower($path);
        return $this->filesystem->get(public_path("builder/$path"));
    }
}
