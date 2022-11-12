@extends('layouts.master')
@section('css')

    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/vendor/datepicker/css/classic.date.css')}}" rel="stylesheet">
    
       
@endsection
@section('title')
المهمات
@stop
@section('content')
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> الادارة </li>
        <li class="breadcrumb-item active">المهمات</li>
    </ol>

    <ul class="app-actions">
        <li>
            <a href="#" id="reportrange">
                <span class="range-text"></span>
                <i class="icon-chevron-down"></i>	
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Print">
                <i class="icon-print"></i>
            </a>
        </li>
        <li>
            <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download CSV">
                <i class="icon-cloud_download"></i>
            </a>
        </li>
    </ul>
</div>
	<!-- Content wrapper start -->
    <div class="content-wrapper">

<!-- Row start -->
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="task-section">
            <!-- Row start -->
            <div class="row no-gutters">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">
                    <div class="labels-container">
                        <div class="mt-5"></div>
                        <div class="lablesContainerScroll">
                            <div class="filters-block">
                                <h5>Filters</h5>
                                <div class="filters">
                                    <a href="#" class="active">
                                        <i class="icon-receipt"></i> All
                                    </a>
                                    <a href="#">
                                        <i class="icon-error"></i> Priority
                                    </a>
                                    <a href="#">
                                        <i class="icon-stars"></i> Starred
                                    </a>
                                    <a href="#">
                                        <i class="icon-check_circle"></i> Done
                                    </a>
                                    <a href="#">
                                        <i class="icon-circle-with-cross"></i> Deleted
                                    </a>
                                </div>
                            </div>
                           										
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                    <div class="tasks-container">
                        <div class="modal fade" id="addNewTask" tabindex="-1" role="dialog" aria-labelledby="addNewTaskLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewTaskLabel">Create Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row gutters">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label for="taskTitle">Task Title</label>
                                                    <input type="text" class="form-control" id="taskTitle" placeholder="Task Title">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="startDate">Start Date</label>
                                                    <div class="custom-date-input">
                                                        <input type="text" name="" class="form-control datepicker" id="startDate" placeholder="10/10/2019">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label for="endDate">End Date</label>
                                                    <div class="custom-date-input">
                                                        <input type="text" name="" class="form-control datepicker" id="endDate" placeholder="10/11/2019">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group mb-0">
                                                    <label for="addResss">Task Details</label>
                                                    <textarea class="form-control" id="addResss"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer custom">
                                        <div class="left-side">
                                            <button type="button" class="btn btn-link danger btn-block" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="right-side">
                                            <button type="button" class="btn btn-link success btn-block">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tasks-header">
                            <h3>Today <span class="date" id="todays-date"></span></h3>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addNewTask">Add New Task</button>
                        </div>
                        <div class="tasksContainerScroll">
                            <!-- Row start -->
                            <div class="row no-gutters justify-content-center">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <section class="task-list">
                                        <!-- Task #1 -->
                                        <div class="task-block">
                                            <div class="task-checkbox">
                                                <input type="checkbox" name="task_00">
                                                <div class="ripple-container">
                                                    <div class="check-off"></div>
                                                    <div class="check-on">
                                                        <i class="icon-check1"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-details">
                                                <div class="task-name">Create Notification</div>
                                                <div class="task-desc">Incentivize, incentivize convergence weblogs, schemas sticky plug-and-play. Customized markets, sticky one-to-one exploit.</div>
                                                <div class="task-types">
                                                   
                                                </div>
                                            </div>
                                            <ul class="task-actions">
                                                <li>
                                                    <a href="#" class="important active" data-toggle="tooltip" data-placement="top" title="Priority">
                                                        <i class="icon-error"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="star" data-toggle="tooltip" data-placement="top" title="Star">
                                                        <i class="icon-stars"></i>
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" id="task-actions" data-toggle="dropdown" aria-haspopup="true">
                                                        <i class="icon-more_vert"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="task-actions">
                                                        <a href="#">
                                                            <i class="icon-done_all"></i> Mark as done
                                                        </a>
                                                        <a href="#">
                                                            <i class="icon-mode_edit"></i> Edit Task
                                                        </a>
                                                        <a href="#">
                                                            <i class="icon-close"></i> Delete Task
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                      

                                     
                                    

                                      

                                    
                                    </section>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    </div>
</div>
<!-- Row end -->

</div>
<!-- Content wrapper end -->
@endsection
@section('js')
	
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.js')}}"></script>
    <script src="{{URL::asset('assets/vendor/datepicker/js/picker.date.js')}}"></script>
    <script src="{{URL::asset('assets/datepicker/js/custom-picker.js')}}"></script>		
@endsection