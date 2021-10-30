@if($fluxContetData)
	
	@foreach($fluxContetData as $content)

		@if($content->layout == 'video_banner')
			@include('partials.sections.video_banner')

		@elseif($content->layout == 'breadcrumb')
			@include('partials.sections.breadcrumb')
		
		@elseif($content->layout == 'image_content')
			@include('partials.sections.image_content')
		
		@elseif($content->layout == 'map_content')
			@include('partials.sections.map_content')
		
		@elseif($content->layout == 'quote')
			@include('partials.sections.quote')
		
		@elseif($content->layout == 'gallery_slider')
			@include('partials.sections.gallery_slider')
		
		@elseif($content->layout == 'card_grid')
			@include('partials.sections.card_grid')
		
		@elseif($content->layout == 'stay_listing')
			@include('partials.sections.stay_listing')
		
		@elseif($content->layout == 'facility_details')
			@include('partials.sections.facility_details')
		
		@elseif($content->layout == 'events_listing')
			@include('partials.sections.events_listing')
		
		@elseif($content->layout == 'offer_listing')
			@include('partials.sections.offer_listing')
		
		@elseif($content->layout == 'itinerary_listing')
			@include('partials.sections.itinerary_listing')
		
		@elseif($content->layout == 'experience_listing')
			@include('partials.sections.experience_listing')
		
		@elseif($content->layout == 'card_slider')
			@include('partials.sections.card_slider')
		
		@elseif($content->layout == 'award_tab')
			@include('partials.sections.award_tab')
		
		@elseif($content->layout == 'gallery_tab')
			@include('partials.sections.gallery_tab')
		
		@elseif($content->layout == 'contact_details')
			@include('partials.sections.contact_details')
		
		@elseif($content->layout == 'general_content')
			@include('partials.sections.general_content')

		@endif

	@endforeach

@endif	
	
