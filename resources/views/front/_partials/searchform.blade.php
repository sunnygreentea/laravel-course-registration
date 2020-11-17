<!-- search section -->
<section class="search-section @if($page=='other') ss-other-page @endif">
	<div class="container">
		<div class="@if($page=='other')search-warp @else search-warp2 @endif">
			<div class="section-title text-white">
				<h2><span>Search your course</span></h2>
			</div>
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<!-- search form -->
					<form class="course-search-form" action="{{ route('front.courses.search') }}" method="GET">
					
						<input type="text" name="title" id="title" placeholder="Course">
						
                        <select  name="category">
                            <option value=0>All Categories</option>
                            @foreach ($globalCategories as $category)
                            <option value={{$category->id}}>{{$category->name}}</option>
                            @endforeach
                        </select>

						<button class="site-btn @if($page=='other') btn-dark @endif">Search Couse</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- search section end -->