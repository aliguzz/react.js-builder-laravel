<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Industries;
use App\Services\TemplateLoader;
use App\Services\TemplateRepository;
use App\Services\ThemesLoader;
use App\TemplateCategories;
use App\Templates;
use File;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{

    private $templateLoader;
    private $repository;
    private $request;

    public function __construct(Request $request, TemplateLoader $templateLoader, TemplateRepository $repository, ThemesLoader $loader)
    {
        $this->templateLoader = $templateLoader;
        $this->repository = $repository;
        $this->request = $request;
        $this->loader = $loader;
    }

    public function index()
    {
        not_permissions_redirect(have_premission(array(67)));
        $data['templates'] = $this->templateLoader->loadAll();
        return view('admin.templates.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        not_permissions_redirect(have_premission(array(62)));
        $data['action'] = "Add";
        $data['industries'] = Industries::get();
        $data['themes'] = $this->loader->loadAll();
        $data['TemplateCategory'] = TemplateCategories::get();
        return view('admin.templates.edit')->with($data);
    }

    public function edit($id)
    {
        not_permissions_redirect(have_premission(array(59)));
        $data['industries'] = Industries::get();
        $data['Templates'] = $this->templateLoader->load($id);
        $data['themes'] = $this->loader->loadAll();
        $data['TemplateCategory'] = TemplateCategories::get();
        $data['action'] = "Edit";
        return view('admin.templates.edit')->with($data);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($input['action'] == 'Edit') {
            not_permissions_redirect(have_premission(array(59)));
            $name = $input['id'];
            $params = $this->request->except('template');
            $params['template'] = $this->request->file('template');
            $params['thumbnail'] = $this->request->file('thumbnail');
            unset($params['action']);
            unset($params['id']);
            unset($params['_token']);
            $this->repository->update($name, $params);
            Alert::success('Success Message', 'Templates updated successfully!')->autoclose(3000);
        } else {
            not_permissions_redirect(have_premission(array(62)));
            $params = $this->request->except('template');
            $params['template'] = $this->request->file('template');
            $params['thumbnail'] = $this->request->file('thumbnail');

            if ($this->templateLoader->exists($params['display_name'])) {
                Alert::error('Error Message', 'Template with this name already exists.')->autoclose(3000);
            }
            unset($params['action']);
            unset($params['id']);
            unset($params['_token']);
            $this->repository->create($params);
            Alert::success('Success Message', 'Templates added successfully!')->autoclose(3000);
        }

        if (have_premission(array(67))) {
            return redirect('admin/templates');
        } else {
            return redirect('admin/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function destroy($id) {
        not_permissions_redirect(have_premission(array(63)));
        Templates::where('id', $id)->delete();
        Templates::destroy($id);
        Alert::success('Success Message', 'Templates deleted successfully!')->autoclose(3000);
        return redirect('admin/templates');
    }

}
