@extends('layouts.back-end')

@section('title', 'All Message')

@push('css')
	<link href="/back-end/plugins/datatables/css/dataTables.bootstrap4.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/fixedHeader/fixedHeader.bootstrap4.min.css" rel="stylesheet" />
	<link href="/back-end/plugins/datatables/css/responsive/responsive.bootstrap4.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Notices</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header">Message</h1>
	<!-- end page-header -->
	
	<!-- begin row -->
	<div class="row">
		<div class="col-lg-12">
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading pb-0">
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<th width="250">Student</th>
							<th width="250">To</th>
							<th>Message</th>
							<th width="150">Date/Time</th>
							<th width="110"></th>
						</thead>
						<tbody>
							@foreach($messages as $message)
								<tr>
									<td>
										<a href="{{ route('back-end.message.show', $message->id) }}" class="text-dark">
											<img src="{{ optional($message->user)->getPicturePath(false) }}" class="mw-100 mr-1" >
											{{ optional($message->user)->name }}
										</a>
									</td>
									<td>
										@if($message->teacher)
											{{ optional($message->teacher)->name }}
										@else
											Administrator
										@endif
									</td>
									<td>{{ str_limit(strip_tags($message->content), 150) }}</td>
									<td>{{ date('Y-m-d h:iA', strtotime($message->created_at)) }}</td>
									<td>
										<a href="{{ route('back-end.message.show', $message->id) }}"> Show</a>
										<a href="#" onclick="if(confirm('Are you sure to delete?')){ $('#message-{{ $message->id }}').submit(); return false;  }" class="text-danger ml-1"> Delete</a>
										   <form style='display:none' id="message-{{$message->id}}" action="{{ route('back-end.message.destroy', $message->id) }}?self=1" method="post">
												@csrf
												@method('DELETE')
											</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
		</div>
			<!-- end panel -->
		</div>
		<!-- end col-10 -->
	</div>
	<!-- end row -->
@endsection

