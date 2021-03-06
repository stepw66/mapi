@extends('layouts.app')

@section('content')
    
    <div class="uk-grid" data-uk-grid-margin="">
    	<div class="app-sidebar uk-width-medium-1-4 uk-row-first">
			<ul class="app-nav uk-nav" data-uk-nav="">
				<!--<li class="uk-nav-header">เมนูจัดการ</li>
				<li>
					<a href="{{ url('routes/hotspot/adduserprofile') }}/{{ Crypt::encrypt($data->mtid) }}">เพิ่มรูปแบบผู้ใช้งาน</a>
				</li>
				<li>
					<a href="{{ url('routes/hotspot/userprofile') }}/{{ Crypt::encrypt($data->mtid) }}">กลับหน้ารูปแบบผู้ใช้งาน</a>
				</li>-->

				@include('routes.menu-routes')
			</ul>
    	</div>
		<div class="app-main uk-width-medium-3-4">

			<ul class="uk-breadcrumb uk-hidden-small">
			    <li><a href="{{ url('routes') }}">อุปกรณ์เชื่อมต่อ</a></li>
			    <li><span>{{ $data->mtname }} </span></li>
			    <li class="uk-active"><span>เพิ่มรูปแบบผู้ใช้งาน</span></li>
			</ul>

			<article class="uk-article">
					<h4 class="uk-article-title">เพิ่มกลุ่มผู้ใช้งาน</h4>

					<form class="uk-form uk-form-horizontal" role="form" method="POST" action="{{ url('routes/hotspot/adduserprofile') }}" >
						{!! csrf_field() !!}
						<input type="hidden" name="mtid" value="{{ $data->mtid }}"> 

						<div class="uk-form-row">
							<label class="uk-form-label" for="name">ชื่อรูปแบบ</label>
							<div class="uk-form-controls">
								<input id="name" name="name" type="text" placeholder="ชื่อรูปแบบ"> <span class="uk-text-primary">* ควรกรอกข้อมูล</span>
								@if ($errors->has('name'))
		                            <span class="uk-text-danger">{{ $errors->first('name') }}</span>
		                        @endif
							</div>
						</div>
						<div class="uk-form-row">
							<label class="uk-form-label" for="session">เวลาในการเชื่อมต่อใช้งานต่อครั้ง</label>
							<div class="uk-form-controls">
								<input id="session" name="session" type="text" placeholder="Session Timeout" value="02:00:00"> <span class="uk-text-primary">* ควรกรอกข้อมูล ตัวอย่าง (ชั่วโมง:นาที:วินาที)</span>
								@if ($errors->has('session'))
		                            <span class="uk-text-danger">{{ $errors->first('session') }}</span>
		                        @endif
							</div>
						</div>
						<div class="uk-form-row">
							<label class="uk-form-label" for="use">ผู้ใช้งานสามารถใช้ได้กี่เครื่อง</label>
							<div class="uk-form-controls">
								<input id="use" name="use" type="text" placeholder="ผู้ใช้งานสามารถใช้ได้กี่เครื่อง" value="1"> <span class="uk-text-primary">* ควรกรอกข้อมูล</span>
								@if ($errors->has('use'))
		                            <span class="uk-text-danger">{{ $errors->first('use') }}</span>
		                        @endif
							</div>
						</div>
						<div class="uk-form-row">
							<label class="uk-form-label" for="limit">กำหนดการใช้งาน</label>
							<div class="uk-form-controls">
								<input id="limit" name="limit" type="text" placeholder="อัพโหลด/ดาวน์โหลด"> <span class="uk-text-primary">ตัวอย่าง (1/1)</span>
							</div>
						</div>
						<div class="uk-form-row">
							<label class="uk-form-label">รายการที่อยู่</label>
							<div class="uk-form-controls">
								{!! Form::select('address', ['none'=>'เลือก'] + $address_list, null, ['class'=> '']) !!} <span class="uk-text-primary">* ควรเลือกรายการ</span>
							</div>
						</div>
						
						<div class="uk-form-row">
							<div class="uk-form-controls">
								<button class="uk-button uk-button-primary">บันทึก</button>
							</div>
						</div>
					</form>

			</article>
		</div>
    </div>

@endsection