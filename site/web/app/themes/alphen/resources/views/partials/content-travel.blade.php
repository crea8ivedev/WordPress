<section class="reservation-form bg-lightyellow lg:pb-100 pb-50">
	<div class="container">
		<div class="reservation-form flex flex-wrap items-center bg-white">
			<div class="lg:w-4/12 w-full">
				<div class="img">
					<img data-src="{!! get_the_post_thumbnail_url(); !!}" alt="{!! get_the_title(); !!}" class="lozad w-full block">
				</div>
			</div>
			<div class="lg:w-8/12 w-full">
				<div class="reservation-content lg:px-100 px-30">
					<div class="title-black">
						<h2 class="h2">{!! get_the_title(); !!}</h2>
					</div>
					<div class="form-content">
						{!! the_content() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>