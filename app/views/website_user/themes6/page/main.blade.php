<div class="container">
	<div class="circle-text"><div>
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >
            	@if(Session::has('email'))
            		{{WebsiteController::getDates()}}
            	@else
            		{{$date_url}}
            	@endif
            </h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
    </div>
</div>
