@extends('admin/layouts.master')

@section('page-wrapper')
  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
                <div class="card-header">{{ $plan->name }}</div>
                <div class="card-body">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection