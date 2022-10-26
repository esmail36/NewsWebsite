@extends('website.parent')

@section('title' , 'Profile')

@section('style')

@endsection

@section('content')


	<div class="container" style="padding: 60px 0">
		<div class="main-body">
		
		
			<div class="row gutters-sm">

				<div class="col-md-12">
						<div class="bar">
							
						</div>
						<div class="profile-photo-div" id="profile-photo-div">
							<div class="profile-img-div" id="profile-img-div">
							<div id="loader"></div>
							{{-- <img id="profile-img" src="https://s3.amazonaws.com/FringeBucket/default-user.png"/> --}}

							@if (Auth::user()->image != null)
						<img  src="{{ asset('storage/images/visitor/'.Auth::user()->image)}}" id="profile-img" alt="Admin">

						{{-- <img id="profile-img" src="https://s3.amazonaws.com/FringeBucket/default-user.png"/> --}}

                        @else
                        <img id="profile-img" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" >
                        @endif
							<input id="x-position" type="range" name="x-position" value="0" min="0"/>
							<input id="y-position" type="range" name="y-position" value="0" min="0"/>
							</div>
							<div class="profile-buttons-div">
							<div class="profile-img-input" id="profile-img-input">
								<label class="button" id="change-photo-label" for="image">UPLOAD PHOTO</label>
								<input id="image" name="image" type="file" style="display: none;" accept="image/*"/>
							</div>
							<div class="profile-img-confirm" id="profile-img-confirm" style="display: none;">
								<div class="button half green" id="save-img">
									<i class="fa fa-check" aria-hidden="true"></i>
									{{-- <i class="fa fa-check" aria-hidden="true"></i> --}}
								</div>
								<div class="button half red" id="cancel-img">
									<i class="fa fa-times" aria-hidden="true"></i>
								</div>
							</div>
							</div>
						</div>
						<div class="error" id="error">min sizes 400*400px</div>
						<canvas id="croppedPhoto" width="400" height="400"></canvas>
				</div>
				
				<button type="button" onclick="photoUpload()" class="btn btn-info">Upload</button>
				<a href="{{ route('showProfile') }}" type="button" class="btn btn-primary ">Return To Profile</a>
	
					<!-- <div class="row gutters-sm">
						<div class="col-sm-6 mb-3">
						<div class="card h-100">
							<div class="card-body">
							<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
							<small>Web Design</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>Website Markup</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>One Page</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>phone Template</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>Backend API</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							</div>
						</div>
						</div>
						<div class="col-sm-6 mb-3">
						<div class="card h-100">
							<div class="card-body">
							<h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
							<small>Web Design</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>Website Markup</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>One Page</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>phone Template</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<small>Backend API</small>
							<div class="progress mb-3" style="height: 5px">
								<div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							</div>
						</div>
						</div>
					</div> -->
		
		
		
					</div>
				</div>
		
			</div>
		</div>

		@endsection


		@section('script')


		<script>

	
			function photoUpload(){
				let formData = new FormData();
				formData.append('image' , document.getElementById('image').files[0]);
				
	
				store('/home/uploadPhoto'  ,formData);
			}
			</script>

		@endsection