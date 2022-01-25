@extends('Admin.admin-master')
@section('body')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Order</h1>
        <a href="{{route('manageorder')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Manage Order</a>
    </div>
</div>  
<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
               <h3 class="text-center bg-warning text-white" >Customar information</h3>
               <table  class="table table-bordered">
                   <tr>
      
                    <th>Customar Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Payment Type</th>
                     <th>Address</th>
                     <th>Order Date</th>
                    
                   </tr>
                    
                   <tr>
                   
                       <td class="align-middle text-center">{{$billing->fname}} {{$billing->lname}}</td>
                       <td class="align-middle text-center">{{$billing->email}}</td>
                       <td class="align-middle text-center">{{ $billing->mobile}}</td>
                       <td class="align-middle text-center">{{$Orders->payment_method}}</td>
                       <td class="align-middle text-center">{{ $billing->address}}</td>
                       <td class="align-middle text-center">{{ $Orders->order_date}}</td>
                      
                   </tr>
               
               </table>
           </div>
       </div>
    </div>
</div> 

<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
           <h3 class="text-center bg-warning text-white" >Shiping information</h3>
               <table  class="table table-bordered">
                   <tr>
                    <th>shiping_id</th>
                    <th>Recipient email</th>
                    <th>Recipient Name</th>
                    <th>Recipien Mobile Number</th>
                     <th>Recipien Address</th>
                     <th>Order Date</th>
                    
                   </tr>
                    
                 
                   <tr>
                       <td class="align-middle text-center" >{{$shiping->id}}</td>
                       <td class="align-middle text-center" >{{$shiping->fname}} {{$shiping->lname}}</td>
                       <td class="align-middle text-center" > {{$shiping->email }}</td>
                       <td class="align-middle text-center">{{ $shiping->mobile}}</td>
                       <td class="align-middle text-center">{{ $shiping->address}}</td>
                       <td class="align-middle text-center">{{ $Orders->order_date}}</td>
                   </tr>
                   
                
               </table>
           </div>
       </div>
    </div>
</div> 


<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
               <h3 class="text-center bg-warning text-white" >Payment information(online)</h3>
               <table  class="table table-bordered">
                   <tr>
      
                    <th>Customar id</th>
                    
                    <th>Mobile Number</th>
                    <th>order_total</th>
                     <th>transaction_id</th>
                     <th>status</th>
                     <th>Payment Date</th>
                    
                   </tr>
                    
                   <tr>
                    @if($Orders->transaction_id)
                       <td class="align-middle text-center" >{{$billing->id}}</td>
                       <td class="align-middle text-center" >{{ $Orders->phone}}</td>
                       <td class="align-middle text-center">{{ $Orders->amount}}</td>
                       <td class="align-middle text-center">{{ $Orders->transaction_id}}</td>

                       <td class="align-middle text-center">{{ $Orders->status}}</td>
                       <td class="align-middle text-center" >{{$Orders->order_date}}</td>

                       @else
                      <td class="align-middle text-center" colspan="6"  > Cash on delivery</td>
                       @endif
                      
                   </tr>
               
               </table>
           </div>
       </div>
    </div>
</div> 


<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
           <h3 class="text-center bg-warning text-white" >Order information</h3>
               <table  class="table table-bordered">
                   <tr>
                    <th>order_id</th>
                    <th>address</th>
                    <th>amount</th>
                     <th>currency</th>
                     <th>Order Status</th>
                     <th>order_date</th>

                    
                   </tr>
                    
                 
                   <tr>
                       <td class="align-middle text-center" >{{ $Orders->id}}</td>
                       <td class="align-middle text-center" >{{ $Orders->address}}</td>
                       <td class="align-middle text-center" > {{ $Orders->amount}}</td>
                       <td class="align-middle text-center">{{ $Orders->currency}}</td>
                       <td class="align-middle text-center">{{$Orders->status}}</td>
                       <td class="align-middle text-center">{{ $Orders->order_date}}</td>
                   </tr>
                   
                
               </table>
           </div>
       </div>
    </div>
</div> 



<div class="row">
    <div class="col-sm-12 container">
       <div class="card card-body rounded-0">
       @if($message = Session::get('message'))
      <div class="alert alert-warning alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
       {{ $message}}
      </div>
      @endif
           <div class="table-responsive ">
           <h3 class="text-center bg-warning text-white" >Products information</h3>
               <table  class="table table-bordered">
                   <tr>
                    <th>SL.NO</th>
                    <th>Product_id</th>
                    <th>Product_Name</th>
                     <th>Product_Price</th>
                    <th>Product_Qty</th>
                    <th>Product_Image </th> 
                   </tr>
                   @foreach($orderDetails as $key => $orderDetails)
                   <tr>
                       <td class="align-middle text-center">{{ $loop->iteration}}</td>
                       <td class="align-middle text-center">{{$orderDetails->Product_id }}</td>
                       <td class="align-middle text-center">{{ $orderDetails->product_name}}</td>
                       <td class="align-middle text-center">{{ $orderDetails->product_price}}</td>
                       <td class="align-middle text-center">{{$orderDetails->product_qty  }}</td>
                       <td class="align-middle text-center"> <img src="{{ asset($orderDetails->product_image) }}" class="" width="80px" height="60px" alt=""></td>
                   </tr>
                   @endforeach
               </table>
           </div>
       </div>
    </div>
</div
@endsection