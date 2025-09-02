@extends('admin.layout')

@section('title', 'Kategoriler')


@section('content')
   <div>
       <div class="card">
           <div class="card-header">
               <strong>Kategori</strong> Ekle
           </div>
           <div class="card-body card-body">

               @if ($errors->any())
                   <div class="alert alert-danger">
                       <ul class="mb-0">
                           @foreach ($errors->all() as $error)
                               <li>{{ $error }}</li>
                           @endforeach
                       </ul>
                   </div>
               @endif


               <form action="{{ route('adm.categories.store') }}" method="post" class="">
                   @csrf
                   <div class="mb-3">
                       <label for="name" class=" form-control-label">Kategori Adı</label>
                       <input type="text" id="name" name="name"  class="form-control">
                   </div>
                   <div class="mb-3">
                       <label for="parent_id" class=" form-control-label">Üst Kategori</label>
                       <br>
                       <select name="parent_id" id="parent_id" class="form-select">
                           <option value="0">Yok</option>
                           @foreach($data['categories'] as $category)
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                       </select>
                   </div>
                   <button type="submit" class="btn btn-primary btn-sm">
                       <i class="fa fa-dot-circle-o"></i> Ekle
                   </button>
               </form>
           </div>
       </div>
       <div class="table-responsive table--no-card m-b-30">
           <table class="table table-borderless table-striped table-earning">
               <thead>
               <tr>
                   <th>name</th>
                   <th class="text-right">price</th>
                   <th class="text-right">quantity</th>
                   <th class="text-right">total</th>
                   <th>customer</th>
                   <th>status</th>
                   <th>payment method</th>
               </tr>
               </thead>
               <tbody>
               @foreach($data['categories'] as $category)
                   <tr>
                       <td>{{ $category->name }}</td>
                       <td class="text-right">$999.00</td>
                       <td class="text-right">1</td>
                       <td class="text-right">$999.00</td>
                       <td>John Smith</td>
                       <td><span class="badge bg-success">Completed</span></td>
                       <td>Credit Card</td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
   </div>

@endsection
