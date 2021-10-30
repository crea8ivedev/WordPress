@if($eventContetData)
	
	@foreach($eventContetData as $content)

		@if($content->layout == 'video_banner')
			@include('partials.sections.video_banner')

		@elseif($content->layout == 'breadcrumb')
			@include('partials.sections.breadcrumb')
		
		@elseif($content->layout == 'image_content')
			@include('partials.sections.image_content')
		
		@elseif($content->layout == 'quote')
			@include('partials.sections.quote')
		
		@elseif($content->layout == 'gallery_slider')
			@include('partials.sections.gallery_slider')
		
		@elseif($content->layout == 'card_grid')
			@include('partials.sections.card_grid')
		
		@elseif($content->layout == 'stay_listing')
			@include('partials.sections.stay_listing')
		
		@elseif($content->layout == 'image_tab_content')
			@include('partials.sections.image_tab_content')
		
		@elseif($content->layout == 'other_event')
			@include('partials.sections.other_stay')

		@endif

	@endforeach

@endif	
	
