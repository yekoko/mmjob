@extends('admin.layout.default')
@section('title')
Industry List
@stop
@section('header_styles')
<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.colReorder.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.scroller.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/dataTables/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css">
<!--end of page level css-->
@stop
@section('content')
<section class="content-header">
    <h1>Industry</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Industry</li>
        <li class="active">Industry</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Industry List
                    </h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered" id="sample_editable_1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Industry Name</th>
                                <th>Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach($industries as $key => $industry)
                             <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$industry->name}}</td>
                                <td>
                                    <div class="col-xs-1"> 
                                        <a href="{{ route('industry.edit', $industry->id) }}">
                                            <i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="edit "></i>
                                        </a>
                                    </div>
                                     
                                    <div class="col-xs-1">                          
                                         <a href="javascript:deleteUser('{{ $industry->id }}');">
                                            <i class="livicon" data-name="remove-alt" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete"></i>
                                         </a>
                                    </div>   
                                           
                                </td>
                             </tr>
                             @endforeach
                        </tbody>
                    </table>
                    {!! $industries->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@section('footer_scripts')
 <!-- begining of page level js -->
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.tableTools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.colReorder.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/dataTables/dataTables.bootstrap.js') }}"></script>
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<script>$(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});</script>

<script type="text/javascript">
    $(function(){
        var table = $('#sample_editable_1').DataTable({
              "bInfo": false,
              "bPaginate": false,
               
          } );
        
    });
    function deleteUser(id) {
        if (confirm('Are you sure want to delete?')) {
        $.ajax({
            type: "DELETE",
            url: '/admin/industry/' + id, //resource
            success: function() {
                    window.location = 'industry';
                 
            }
        });
    }
}
</script>
@stop