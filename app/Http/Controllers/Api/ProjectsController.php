<?php

namespace App\Http\Controllers\Api;

use App\Project;
use App\Services\ProjectRepository;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Storage;
use Vebto\Bootstrap\Controller;
use Vebto\Database\Paginator;
use Alert;

class ProjectsController extends Controller
{

    private $request;
    private $project;
    private $repository;

    public function __construct(Request $request, Project $project, ProjectRepository $repository)
    {
        $this->request = $request;
        $this->project = $project;
        $this->repository = $repository;
        $this->storage = Storage::disk('public');
    }

    public function index()
    {
        $this->authorize('index', [Project::class, $this->request->get('user_id')]);
        $paginator = (new Paginator($this->project));
        if ($this->request->has('user_id')) {
            $paginator->query()->whereHas('users', function (Builder $q) {
                return $q->where('users.id', $this->request->get('user_id'));
            });
        }
        if ($this->request->has('published') && $this->request->get('published') !== 'all') {
            $paginator->query()->where('published', $this->request->get('published'));
        }
        return $paginator->with('users')->paginate($this->request->all());
    }

    public function show($id)
    {

        $project = $this->project->with('pages', 'users')->findOrFail($id);
        $project = $this->repository->load($project);
        return $this->success(['project' => $project]);
    }

    public function DOMinnerHTML(DOMNode $element)
    {
        $innerHTML = "";
        $children = $element->childNodes;

        foreach ($children as $child) {
            $innerHTML .= $element->ownerDocument->saveHTML($child);
        }

        return $innerHTML;
    }

    public function updatePage()
    {
        $input = $this->request->all();
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $user = $project->users->first();
        $page_forms = '';
        $html = '<!DOCTYPE html><html class="'.$input['html_classes'].'" lang="'.$input['html_lang'].'">' . $input['pagehtml'] . '</html>';

        if ($user->facebook_page_id != '') {
            $contect_messenger = 'http://m.me/' . $user->facebook_page_id;
        } else {
            $contect_messenger = '[MESSAGEUSFBMESSENGER]';
        }

        $html = str_replace('[MESSAGEUSFBMESSENGER]', $contect_messenger, $html);
        $html = str_replace('[SUBMIT_URL]', url('post-lead'), $html);
        $html = str_replace('[PAGE_NAME]', $input['currentPage'], $html);
        $html = str_replace('[PROJECT_ID]', $id, $html);
        $page_name = ucfirst($input['currentPage']);

        $string = '/value="' . $page_name . ' Form [0-9]"/';
        $matches = array();
        $max_value = 0;

        if (preg_match_all($string, $html, $matches)) {
            foreach ($matches[0] as $match) {
                $form_name = str_replace('"', "", str_replace('value="', "", $match));
                if ($page_forms == '') {
                    $page_forms = $form_name;
                } else {
                    $page_forms .= ',' . $form_name;
                }
                $value_number = str_replace('"', "", str_replace('value="' . $page_name . ' Form ', "", $match));
                if ($value_number > $max_value) {
                    $max_value = $value_number;
                }
            }
        }

        $new_forms = substr_count($html, '[FORM_NAME]');
        if ($new_forms > 0) {
            $max_value = $max_value + 1;
            for ($i = $max_value; $i <= $max_value + $new_forms; $i++) {
                $form_name = $page_name . ' Form ' . $i;
                $html = str_replace_first("[FORM_NAME]", $form_name, $html);
                if ($page_forms == '') {
                    $page_forms = $form_name;
                } else {
                    $page_forms .= ',' . $form_name;
                }
            }
        }
        $input['pagehtml'] = $html;

        $project->published = 0;
        $project->forms = $page_forms;
        $this->repository->update($project, $input);
        
        
        $user = Auth::user();
        $user_id = $user->id;
        $project_log = array(
            'message' => $input['currentPage'].' Page updated',
            'user_id' => $user_id,
            'project_id' => $id
        );
      
       \DB::table('project_log')->insert($project_log);
        
        return $this->success(['project' => $this->repository->load($project)]);
    }

    public function addPage()
    {
        $input = $this->request->all();
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $newPageName = strtolower(str_replace(" ", "_", $input['newPageName']));
        $p_name = $project->name;

        $user_id = $project->users->first()->id;
        $projectPathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $newPageName;
        $projectPathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $newPageName;

        $uuid = $project->uuid;

        $newPageHtml = '<html><head><base id="base" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/"><link rel="stylesheet" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/css/framework.css?=' . $p_name . '" id="framework-css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" id="font-awesome"><link rel="stylesheet" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/css/theme.css?=' . $p_name . '" id="theme-css"><link rel="stylesheet" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/css/custom_elements.css?=' . $p_name . '" id="custom-elements-css"><link rel="stylesheet" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/css/template.css?=' . $p_name . '" id="template-css"><link rel="stylesheet" href="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/css/styles.css?=' . $p_name . '" id="custom-css"></head><body><script id="jquery" src="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/js/jquery.min.js?=' . $p_name . '"></script><script id="framework-js" src="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/js/framework.js?=' . $p_name . '"></script><script id="template-js" src="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/js/template.js?=' . $p_name . '"></script><script id="custom-js" src="' . url('/') . '/storage/projects/' . $user_id . '/' . $uuid . '/js/scripts.js?=' . $p_name . '"></script><script async src="https://www.googletagmanager.com/gtag/js?id=UA-115314865-1"></script><script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag("js", new Date());gtag("config", "UA-115314865-1");</script></body></html>';
        if ($this->storage->exists($projectPathd . '.html')) {
            $projectPathd = $projectPathd . '(copy)';
            $projectPathm = $projectPathm . '(copy)';
        }
        $this->storage->put($projectPathd . '.html', $newPageHtml);
        $this->storage->put($projectPathm . '.html', $newPageHtml);
        
          
        $project_log = array(
            'message' => $newPageName.' Page added',
            'user_id' => $user_id,
            'project_id' => $project->id
        );
      
       \DB::table('project_log')->insert($project_log);
        
        return $this->success(['project' => $this->repository->load($project)]);
    }

    public function renamePage()
    {
        $input = $this->request->all();
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $newPageName = str_replace(" ", "-", $input['newPageName']);
        if ($newPageName == "") {
            echo json_encode(array('error' => 1, 'message' => 'Page name is empty!'));
            exit();
        }
        $oldPageName = str_replace(" ", "-", $input['oldPageName']);
        $user_id = $project->users->first()->id;

        $newPagePathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $newPageName;
        $newPagePathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $newPageName;

        $oldPagePathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $oldPageName;
        $oldPagePathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $oldPageName;

        if ($this->storage->exists($newPagePathd . '.html')) {
            echo json_encode(array('error' => 1, 'message' => 'Page name already exist!'));
            exit();
        }

        $newPageHtmld = $this->storage->get($oldPagePathd . '.html');
        $newPageHtmlm = $this->storage->get($oldPagePathm . '.html');

        $this->storage->delete($oldPagePathd . '.html');
        $this->storage->delete($oldPagePathm . '.html');

        $this->storage->put($newPagePathd . '.html', $newPageHtmld);
        $this->storage->put($newPagePathm . '.html', $newPageHtmlm);

        
        
        $project_log = array(
            'message' => ' renamed Page name from '.$oldPageName.' to '.$newPageName,
            'user_id' => $user_id,
            'project_id' => $project->id
        );
      
       \DB::table('project_log')->insert($project_log);
        return $this->success(['project' => $this->repository->load($project)]);

    }
    public function clonePage()
    {
        $input = $this->request->all();
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);

        $PageName = strtolower(str_replace(" ", "_", $input['PageName']));
        $newPageName = strtolower(str_replace(" ", "_", $input['PageName'])) . '(copy)';
        $user_id = $project->users->first()->id;

        $newPagePathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $newPageName;
        $newPagePathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $newPageName;

        $PagePathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $PageName;
        $PagePathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $PageName;

        while ($this->storage->exists($newPagePathd . '.html')) {
            $newPagePathd = $newPagePathd . '(copy)';
            $newPagePathm = $newPagePathm . '(copy)';
        }
        $newPageHtmld = $this->storage->get($PagePathd . '.html');
        $newPageHtmlm = $this->storage->get($PagePathm . '.html');

        $this->storage->put($newPagePathd . '.html', $newPageHtmld);
        $this->storage->put($newPagePathm . '.html', $newPageHtmlm);

         $project_log = array(
            'message' => ' cloned Page name from '.$PageName.' to '.$newPageName,
            'user_id' => $user_id,
            'project_id' => $project->id
        );
      
       \DB::table('project_log')->insert($project_log);
       
        return $this->success(['project' => $this->repository->load($project)]);

    }

    public function deletePage()
    {
        $input = $this->request->all();
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $PageName = strtolower(str_replace(" ", "_", $input['PageName']));

        $user_id = $project->users->first()->id;

        $PagePathd = 'temp_projects/' . $user_id . '/' . $project->uuid . '/desktop/' . $PageName;
        $PagePathm = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $PageName;

        $this->storage->delete($PagePathd . '.html');
        $this->storage->delete($PagePathm . '.html');

        return $this->success(['project' => $this->repository->load($project)]);
    }

    public function store()
    {
        $this->authorize('store', Project::class);

        $this->validate($this->request, [
            'name' => 'required|string|min:1|max:255|unique:projects',
            'css' => 'nullable|string|min:1|max:255',
            'js' => 'nullable|string|min:1|max:255',
            'template' => 'nullable|array',
            'template.id' => 'integer',
            'template.css' => 'nullable|string|min:1',
            'template.js' => 'nullable|string|min:1',
            'uuid' => 'required|string|size:36',
            'published' => 'boolean',
            'framework' => 'nullable|string|max:255',
        ]);

        $project = $this->repository->create($this->request->all());

        return $this->success(['project' => $this->repository->load($project)]);
    }

    public function destroy()
    {
        foreach ($this->request->get('ids') as $id) {
            $project = $this->project->findOrFail($id);
            $this->authorize('destroy', $project);
            $this->repository->delete($project);
        }
        return $this->success();
    }

    public function test()
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
    public function getDomains()
    {
        $user = Auth::user();
        $input = $this->request->all();
        $projectId = $input['projectId'];
        $data['domainsData'] = \App\Domains::where('user_id', $user->id)->get();
        $data['projectData'] = Project::where('id', $projectId)->first();
        echo json_encode($data);exit;
    }
    public function setPublish()
    {
        $input = $this->request->all();
        $projectId = $input['projectId'];
        $published = $input['published'];
        $data['projectData'] = Project::where('id', $projectId)->update(["published"=>$published]);
        if($published == 1){
            $project = $this->project->with('users')->find($projectId);
            $directory = '../public/storage/projects/' . $project->users->first()->id . '/' . $project->uuid. '/desktop/';
            if (glob($directory . "*.html") != false) {
                foreach (glob($directory . "*.html") as $pg) {
                    $pg = str_replace('../public/storage/','',$pg);
                    $pg2 = str_replace('desktop','mobile',$pg);
                    $this->storage->delete($pg);
                    $this->storage->delete($pg2);
                }

            }
            $directory = '../public/storage/temp_projects/' . $project->users->first()->id . '/' . $project->uuid. '/desktop/';
            if (glob($directory . "*.html") != false) {
                foreach (glob($directory . "*.html") as $pg_temp) {
                    $pg_temp = str_replace('../public/storage/','',$pg_temp);
                    $pg = str_replace('temp_projects','projects',$pg_temp);
                    $pg2 = str_replace('desktop','mobile',$pg);
                    $pg2_temp = str_replace('desktop','mobile',$pg_temp);

                    $newPageHtmld = $this->storage->get($pg_temp);
                    $newPageHtmlm = $this->storage->get($pg2_temp);

                    $this->storage->put($pg, $newPageHtmld);
                    $this->storage->put($pg2, $newPageHtmlm);
                }
            }
        }
        
        
        $user_id = $user->id;
        $project_log = array(
            'message' => ' published the project',
            'user_id' => $user_id,
            'project_id' => $projectId
        );
      
       \DB::table('project_log')->insert($project_log);
        
        echo json_encode(array("success"=>1));exit;
    }
    public function setDomain()
    {
        $user = Auth::user();
        $input = $this->request->all();
        $projectId = $input['projectId'];
        $domainId = $input['domainId'];
        \App\Domains::where('user_id', $user->id)->where('id', $domainId)->update(["project_id" => $projectId]);
        $domains = \App\Domains::where('user_id', $user->id)->get();
        
        
        
        $user_id = $user->id;
        $project_log = array(
            'message' => ' connected the domain',
            'user_id' => $user_id,
            'project_id' => $projectId
        );
      
       \DB::table('project_log')->insert($project_log);
        
        echo json_encode($domains);exit;
    }

    public function add_element(){
        $input = $this->request->all();
        $parent_data_item = $input["parentDataItem"];
        $html = $input["html"];
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $PageName = $input['PageName'];
        $user_id = $project->users->first()->id;
        $PagePath = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $PageName;
        $newPageHtml = $this->storage->get($PagePath . '.html');

        $newPageHtml = str_replace("</body>",$html."</body>",$newPageHtml);
    
        $this->storage->put($PagePath . '.html', $newPageHtml);

        return $this->success(['project' => $this->repository->load($project)]);
    }
    public function update_element(){
        $input = $this->request->all();
        $data_item = $input["dataItem"];
        $html = $input["html"];
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $user_id = $project->users->first()->id;
        $PageName = $input['PageName'];
        $PagePath = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $PageName;
        $newPageHtml = $this->storage->get($PagePath . '.html');

        $newPageHtml = preg_replace('/<(\w+)[^>]*?data-item="'. $data_item.'".*?<\/.*?>/i',$html, $newPageHtml);

        $this->storage->put($PagePath . '.html', $newPageHtml);
        return $this->success(['project' => $this->repository->load($project)]);
    }
    public function remove_element(){
        $input = $this->request->all();
        $data_item = $input["dataItem"];
        $id = $input['projectId'];
        $project = $this->project->with('users')->find($id);
        $user_id = $project->users->first()->id;
        $PageName = $input['PageName'];
        $PagePath = 'temp_projects/' . $user_id . '/' . $project->uuid . '/mobile/' . $PageName;
        $newPageHtml = $this->storage->get($PagePath . '.html');
       /* header("Content-Type:text/plain");
        echo '<(\w+)[^>]*?data-item="1000000036".*?<\/.*?>';*/
        $newPageHtml = preg_replace('/<(\w+)[^>]*?data-item="'. $data_item.'".*?<\/.*?>/i',"", $newPageHtml);
        
        $this->storage->put($PagePath . '.html', $newPageHtml);
        return $this->success(['project' => $this->repository->load($project)]);
    }
    public function delete_site($project_id) {
        $project = $this->project->findOrFail($project_id);
        $this->repository->delete($project);
        \DB::table('site_seo_settings')->where('project_id',$project->id)->delete();
        \DB::table('pages_seo_settings')->where('project_id',$project->id)->delete();
        \DB::table('pages_tracking_codes')->where('project_name', $project->name)->delete();
        \DB::table('pages_email_lists')->where('project_id', $project_id)->delete();
        Alert::success('Your Site has been deleted Successfully!!')->autoclose(3000);
        return redirect('admin/panda-pages');
    }
    public function get_history(){
        $input = $this->request->all();
        $id = $input['projectId'];

       $data = \DB::table('project_log')->select("project_log.*", \DB::raw("(SELECT CONCAT(u.first_name,' ',u.last_name) FROM users AS u WHERE u.id = project_log.user_id) AS user_name"))->where('project_id',$id)->get();
        return $this->success(['log' => $data]);
    }

}
