<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Vebto\Bootstrap\Controller;
use App\Services\ProjectRepository;
use Vebto\Settings\Settings;

class UserSiteController extends Controller
{
    /**
     * @var Project
     */
    private $project;

    /**
     * @var ProjectRepository
     */
    private $projectRepository;
    /**
     * @var Settings
     */
    private $settings;

    /**
     * UserSiteController constructor.
     *
     * @param Project $project
     * @param ProjectRepository $projectRepository
     * @param Settings $settings
     */
    public function __construct(Project $project, ProjectRepository $projectRepository, Settings $settings)
    {
        $this->project = $project;
        $this->projectRepository = $projectRepository;
        $this->settings = $settings;

        //user site routing is disabled by admin
        if ($this->settings->get('builder.routing_type') === 'none') abort(404);
    }

    /**
     * Show specified project's site.
     *
     * @param string $projectName
     * @param string|null $pageName
     * @return string
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($projectName, $pageName = null)
    {
        $project = $this->project->where('name', $projectName)->firstOrFail();
        
        try {
            $html = $this->projectRepository->getPageHtml($project, $pageName);
            return $this->replaceRelativeLinks($projectName, $html);
        } catch (FileNotFoundException $e) {
            return abort(404);
        }
       
    }

    /**
     * Replace relative urls in html to absolute ones.
     *
     * @param string $projectName
     * @param string $html
     * @return mixed
     */
    private function replaceRelativeLinks($projectName, $html)
    {
        $post_fix = '';
        if(isset($_GET['mobile']) && $_GET['mobile'] == 1){
            $post_fix = '?mobile=1';  
        }
        $html = str_replace('href="#"','href="javascript:void(0)"', str_replace("href='#'","href='javascript:void(0)'", $html));
        preg_match_all('/<a.*?href="(.+?)"/i', $html, $matches);
        
        //there are no links in html
        if ( ! isset($matches[1])) return $html;

        $base = url("sites/$projectName");

        //get rid of duplicate links
        $urls = array_unique($matches[1]);
        foreach ($urls as $url) {
           
            //if link is already absolute or an ID, continue to next one
            if (starts_with($url, ['//', 'http', 'callto', 'mailto', 'images','#primary-nav'])) continue;

            if (starts_with($url, ['#'])){
                $html = preg_replace("/href=\"$url\"/i", "href=\"".$base.$url.$post_fix."\"", $html);
            }else{
                $html = preg_replace("/href=\"$url\"/i", "href=\"".$base."/".$url.$post_fix."\"", $html);
            }
            
        }
        return $html;
    }
}
