 <!--**********************************
    Sidebar start
***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
             <li><a class="has-arrow ai-icon" href="{{ url('admin/dashboard') }}" aria-expanded="false">
                     <i class="flaticon-dashboard-1"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             @php
            $isActiveSlider = request()->routeIs('create.slider') ||
                            request()->routeIs('store.slider') ||
                            request()->routeIs('edit.slider') ||
                            request()->routeIs('show.slider');
           $isActiveSupport =request()->routeIs('create.support') ||
                            request()->routeIs('store.support') ||
                            request()->routeIs('edit.support') ||
                            request()->routeIs('show.support');
            $isActiveAbout=request()->routeIs('create.about') ||
                            request()->routeIs('store.about') ||
                            request()->routeIs('edit.about') ||
                            request()->routeIs('show.about');
            $isActiveService=request()->routeIs('create.service') ||
                            request()->routeIs('store.service') ||
                            request()->routeIs('edit.service') ||
                            request()->routeIs('show.service');
            $isActiveProject=request()->routeIs('create.project') ||
                            request()->routeIs('store.project') ||
                            request()->routeIs('edit.project') ||
                            request()->routeIs('show.project');
            $isActiveClient=request()->routeIs('create.client') ||
                            request()->routeIs('store.client') ||
                            request()->routeIs('edit.client') ||
                            request()->routeIs('show.client');
            $isActiveTestimonial=request()->routeIs('create.testimonial') ||
                            request()->routeIs('store.testimonial') ||
                            request()->routeIs('edit.testimonial') ||
                            request()->routeIs('show.testimonial');
            $isActiveGallery=request()->routeIs('create.gallery') ||
                            request()->routeIs('store.gallery') ||
                            request()->routeIs('edit.gallery') ||
                            request()->routeIs('show.gallery');
            $isActiveCarrier=request()->routeIs('create.carrier') ||
                            request()->routeIs('store.carrier') ||
                            request()->routeIs('edit.carrier') ||
                            request()->routeIs('show.carrier');
            $isActiveTeams=request()->routeIs('create.teams') ||
                            request()->routeIs('store.teams') ||
                            request()->routeIs('edit.teams') ||
                            request()->routeIs('show.teams');
            $isActiveSuccess=request()->routeIs('create.success') ||
                            request()->routeIs('store.success') ||
                            request()->routeIs('edit.success') ||
                            request()->routeIs('show.success');
            $isActiveIdoelogy = request()->routeIs('create.idoelogy') ||
                                request()->routeIs('store.idoelogy') ||
                                request()->routeIs('edit.idoelogy') ||
                                request()->routeIs('show.idoelogy');
           @endphp
            <li @if ($isActiveSlider || $isActiveIdoelogy || $isActiveSupport || $isActiveSuccess || $isActiveAbout || $isActiveService || $isActiveProject || $isActiveClient || $isActiveTestimonial || $isActiveGallery || $isActiveCarrier ||  $isActiveTeams)
             class="mm-active" @endif>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-blueprint"></i>
                    <span class="nav-text">Home Master</span>
                </a>
                <ul aria-expanded="false" @if ($isActiveSlider || $isActiveSupport || $isActiveIdoelogy || $isActiveSuccess || $isActiveAbout || $isActiveService || $isActiveProject || $isActiveClient || $isActiveTestimonial || $isActiveGallery || $isActiveCarrier ||
                $isActiveTeams) class="mm-active mm-collapse mm-show" @endif>
                    <li @if ($isActiveSlider) class="mm-active" @endif> <a href="{{ url('admin/slider') }}"> Slider</a></li>
                    <li  @if ($isActiveSupport) class="mm-active" @endif><a href="{{ url('admin/support') }}">Support</a></li>
                    <li  @if ($isActiveAbout) class="mm-active" @endif><a href="{{ url('admin/about') }}">About</a></li>
                    <li @if ($isActiveService) class="mm-active" @endif><a href="{{ url('admin/service') }}">Service</a></li>
                    <li  @if ($isActiveProject) class="mm-active" @endif><a href="{{ url('admin/project') }}">Project</a></li>
                    <li @if ($isActiveClient) class="mm-active" @endif><a href="{{ url('admin/client') }}">Clients</a></li>
                    <li @if ($isActiveTestimonial) class="mm-active" @endif><a href="{{ url('admin/testimonials') }}">Testimonial</a></li>
                    <li @if ($isActiveGallery) class="mm-active" @endif><a href="{{ url('admin/gallery') }}">Gallery</a></li>
                    <li @if ($isActiveCarrier) class="mm-active" @endif><a href="{{ url('admin/carrier') }}">Carrier</a></li>
                    <li @if ($isActiveTeams) class="mm-active" @endif><a href="{{ url('admin/teams') }}">Teams</a></li>
                    <li @if ($isActiveSuccess) class="mm-active" @endif><a href="{{ url('admin/success') }}">Success</a></li>
                    <li @if ($isActiveIdoelogy) class="mm-active" @endif><a href="{{ url('admin/ideology') }}">IDOELOGY</a></li>
                </ul>
            </li>
            @php
            $isActiveServiceDetials=request()->routeIs('create.service-details') ||
                                    request()->routeIs('store.service-details') ||
                                    request()->routeIs('edit.service-details') ||
                                    request()->routeIs('show.service-details');
            $isActiveProjectDetials=request()->routeIs('create.project-details') ||
                                    request()->routeIs('store.project-details') ||
                                    request()->routeIs('edit.project-details') ||
                                    request()->routeIs('show.project-details');
            $isActiveIdoelogyDetials=request()->routeIs('create.ideology-details') ||
                                    request()->routeIs('store.ideology-details') ||
                                    request()->routeIs('edit.ideology-details') ||
                                    request()->routeIs('show.ideology-details');
            @endphp
            <li  @if($isActiveServiceDetials || $isActiveProjectDetials || $isActiveIdoelogyDetials) class="mm-active" @endif>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-add"></i>
                    <span class="nav-text">Menu Details</span>
                </a>
                <ul aria-expanded="false" @if($isActiveServiceDetials || $isActiveProjectDetials || $isActiveIdoelogyDetials)  class="mm-active mm-collapse mm-show" @endif>
                    <li ><a href="{{ url('admin/service-details') }}" @if ($isActiveServiceDetials) class="mm-active" @endif>Service Details</a></li>
                    <li ><a href="{{ url('admin/project-details') }}" @if ($isActiveProjectDetials) class="mm-active" @endif>Project Details</a></li>
                    <li ><a href="{{ url('admin/ideology-details') }}" @if ($isActiveIdoelogyDetials) class="mm-active" @endif>Ideology Details</a></li>
                </ul>
            </li>
         </ul>
     </div>
 </div>
 <!--**********************************
    Sidebar end
***********************************-->
