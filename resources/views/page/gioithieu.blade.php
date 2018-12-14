@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Giới thiệu</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Giới thiệu</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<div class="our-history">
				<h2 class="text-center wow fadeInDown">Our History</h2>
				<div class="space35">&nbsp;</div>

				<div class="history-slider">
					<div class="history-navigation">
						<a data-slide-index="0" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2017</span></a>
						<a data-slide-index="1" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
						<a data-slide-index="2" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
						<a data-slide-index="3" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2018</span></a>
						<a data-slide-index="4" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2019</span></a>
						<a data-slide-index="5" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2019</span></a>
						<a data-slide-index="6" href="blog_with_2sidebars_type_e.html" class="circle"><span class="auto-center">2019</span></a>
					</div>

					<div class="history-slides">
						@foreach($intro as $i)
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/image/slide/{{$i->image}}" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">{{$i->highlight}}</h5>
								<p>
									{{$i->time_highlight}},<br />
									{{$i->address}}
								</p>
								<div class="space20">&nbsp;</div>
								<p>{{$i->content}}</p>
							</div>
							</div> 
						</div>
						@endforeach
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Web Design</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Web Development</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Photoshop</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Skill</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Project.</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
						<div> 
							<div class="row">
							<div class="col-sm-5">
								<img src="source/assets/dest/images/history.jpg" alt="">
							</div>
							<div class="col-sm-7">
								<h5 class="other-title">Coffe</h5>
								<p>
									Suite 127 / 267 – 277 Brussel St,<br />
									62 Croydon, NYC<br />
									New York
								</p>
								<div class="space20">&nbsp;</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem.</p>
							</div>
							</div> 
						</div>
					</div>
				</div>
			</div>

			
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection