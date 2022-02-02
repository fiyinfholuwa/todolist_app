
@extends('layout')

@section('main-content')
    <div class="card-header-tab card-header">
     <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists</div>
    </div>
    <div class="scroll-area-sm">
        <perfect-scrollbar class="ps-show-limits">
            <div style="position: static;" class="ps ps--active-y">
                <div class="ps-content">
                    <ul class=" list-group list-group-flush">
                @foreach($tasks as $task)
                        <li class="list-group-item">
                            <div class="todo-indicator bg-warning"></div>
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    
                                    <div class="widget-content-left">
                                        
                                        <div class="widget-heading"><h3 class="note-headings">
                                             
                                        @if($task->status ==='Todo')
                                        {{ $task->title}}.
                                        @else
                                        <del>{{ $task->title}}.</del>
                                        @endif
                                            <span  style="font-size: 8px;" class="badge badge-info ml-2">
                                            {{$task->created_at->diffForHumans()}}</span></h3>
                                        </div>
                                        <div class="widget-heading text-primary"><h5 class="note-headings">
                                        @if($task->status ==='Todo')
                                        {{$task->description}}.
                                        @else
                                        <del>{{$task->description}}.</del>
                                        @endif
                                        </h5>
                                        </div>
                                        <div class="widget-subheading"><p> 
                                        @if($task->status ==='Todo')
                                        <i><span class="badge badge-warning ml-2">Todo</span></i>
                                        @else
                                        <i><span class="badge badge-success ml-2">Done</span></i>
                                        @endif
                                         Last updated: {{$task->updated_at->diffForHumans() }}</p></div>
                                    </div>
                                    <div class="widget-content-right"> <a  href="{{route('task.edit', $task->id)}}" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-edit"></i></a> 
                                    <form action="{{route('task.destroy', $task->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                       <button onclick="confirm('are you sure you want to delete')" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> 
                                    </form>
                                </div>
                                    
                                </div>
                            </div>
                        </li>
                    @endforeach

                    @if(count($tasks)===0)
                    <div class="p-4"><h6 class="alert alert-danger">no task found, please create one.</h6></div>
                    @endif
                    </ul>
                </div>
            </div>
        </perfect-scrollbar>
        
    </div>
    <div class="d-block text-right card-footer"><a href="{{route('task.create')}}" class="btn btn-primary">Add Task <i class="fa fa-plus"></i></a></div>
@endsection