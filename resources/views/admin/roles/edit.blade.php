@extends('admin.layouts.app')

@section('content')

@include('admin.settings.subheader') 
<script src="{{ asset('js/plugins/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('js/plugins/validation/additional-methods.min.js')}}"></script>

<div class="container-fluid">
    <div id="loading" style="display: none;"></div>
    <section class="inner-full-width-panel pr-30">
        <div class="tab-content">
            <div id="menu1" class="right-content-space">

                <div class="editor-domain-container-heading">
                    <div class="page-header"><h3>{!!$action!!} Role</h3></div>
                </div>

            <div class="box-content border">
                <form id="role-form" class="form-horizontal form-validate" action="{{url('/admin/roles')}}" method="POST">
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label">Title</label>
                        <div class="col-sm-12 padding0">
                            <input type="text" class="form-control" name="title" value="{!!@$role['title']!!}" aria-required="true" data-rule-required="true"/>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="{!!$action!!}">
                    <input type="hidden" name="id" value="{!!@$role['id']!!}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-12 padding0 control-label" for="is_active">Status</label>
                        <div class="col-sm-12 padding0">
                            <input type="radio" name="is_active" value="1" @if(!isset($role['is_active']) || $role['is_active'] == 1) checked @endif /> Active &nbsp;&nbsp; <input type="radio" name="is_active" value="0"  @if(isset($role['is_active']) && $role['is_active'] == 0) checked @endif/> Inactive
                        </div>
                    </div>
                    <h4 class="sub_heading">Permissions</h4>
                    <?php
                    $previous_module = '';
                    $subcontainer = '';
                    ?>
                    @foreach($rights as $right)
                    <?php
                    $count = array();
                    if ($right->module_name != $previous_module) {
                        $all_checked = '';

                        if ($previous_module != '') {
                            echo '</div></div>';
                        }
                        ?>
                        <div class="form-group permissions-checkboxes role-permissions-box">
                            <label class="col-sm-4 padding0 control-label"><span class="role-check-box">{!!$right->module_name!!}</span>
                                <input class="check_all" <?php echo $all_checked ?> type="checkbox"/> <small>Check All</small>
                            </label>
                            <div class="col-sm-12 row">
                                <?php
                            }
                            ?>

                                <div class="col-sm-3" style="margin-bottom: 15px;"><input class="permission-checkbox @if(strpos($right->right_name,'View')!== false)viewable @endif" type="checkbox" name="right_id[]" value="{!!$right->id!!}" @if(isset($right->is_selected) && $right->is_selected !='') checked @endif/> {!!$right->right_name!!}</div>
                            <?php
                            $previous_module = $right->module_name;
                            ?>

                            @endforeach
                        </div>
                    
                    <div class="form-actions">
                        <div class="col-sm-3 control-label"></div>
                        <a href="{{url('/admin/roles')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-preview">Continue</button>
                    </div>
                </form>
            </div>


            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $(".check_all").change(function () {
        var element = $(this);
        element.parent('.col-sm-4').next('.col-sm-12').find('input[type="checkbox"]').prop('checked', element.is(":checked"));
    });
    
    $('.col-sm-3 input[type="checkbox"]').change(function () {
        
        $(this).parent().siblings().find('.viewable').prop('checked', true);
    });
    
    });
    
</script>
@endsection
