@extends('Admin.admin-master')
@section('body')
<div class="container">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Order</h1>
        <a href="{{route('delete-massege',['id' => $contuctmasseg->id])}}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-trash fa-sm text-white-50"></i>Delete</a>
    </div>


<div class="row">
    <div class="table-responsive ">
        <h3 class="text-center bg-warning text-white">Customar massege</h3>
        <table class="table table-bordered">

           <tr>  
               <th>Customar Name</th>
                <td class="align-middle text-center">{{ $contuctmasseg->customerName }}</td>
              
            </tr>
            <tr> 
                 <th>Customar Email</th>
                <td class="align-middle text-center">{{ $contuctmasseg->customerEmail}}</td>
              
            </tr>
            <tr>
                <th>Subject</th>
                <td class="align-middle text-center">{{  $contuctmasseg->contactSubjec}}</td>
                
            </tr>
            <tr> 
                 <th>Massege Contain </th>
                <td class="align-middle text-center">{{ $contuctmasseg->contactMessage}}</td>
              
            </tr>

        </table>
    </div>
</div>
</div>
 @endsection