@extends('app')

@section('content')
		<div class="panel panel-default">
			<div class="panel-heading">หน้าหลัก</div>

			<div class="panel-body">
					ยินดีต้อนรับ คุณ {{Auth::user()->name}}!

					@if(Auth::user()->isAdmin(Auth::user()->name))
						<br />admin นะ
					@endif
			</div>
		</div>
@endsection
