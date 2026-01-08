<ul>
    <li class="has-dropdown">
        <a href="javascript:void()">About Us</a>
        <ul class="submenu">
            <li><a href="{{ route('website.about') }}">Our History</a></li>
            <li><a href="{{ route('website.vision_and_mission') }}">Vision & Mission</a></li>
            <li><a href="{{ route('website.vision_and_mission') }}#philosophy">Philosophy</a></li>
            <li><a href="{{ route('website.our_identity') }}">Our Identity</a></li>
            <li><a href="{{ route('website.leadership') }}">Governing Council</a></li>
            <li><a href="{{ route('website.academic_board') }}">Management Staff</a></li>
            <!-- <li><a href="{{ route('website.academic_staff') }}">Academic Staff</a></li> -->
            <!-- <li><a href="#">Non Academic Staff</a></li> -->
            <li><a href="#">Organizational Chart</a></li>
        </ul>
    </li>
    <li class="has-dropdown">
        <a href="javascript:void()">Admissions</a>
        <ul class="submenu">
            <li><a href="{{ route('website.requirement') }}">Entry Requirement</a></li>
            <li><a href="{{ route('website.fees') }}">Fees & Payment guide</a></li>
            <li><a href="{{ route('website.faq') }}">FAQ</a></li>
            <li><a href="{{ route('website.admission_checker') }}">Check Admission Status</a></li>
        </ul>
    </li>
    <li class="has-dropdown">
        <a href="javascript:void()">Academics</a>
        <ul class="submenu">
            <li><a href="#">Schools & Departments</a></li>
            <li><a href="#">Courses & Programmes</a></li>
            <li><a href="#">Library & E-Resources</a></li>
            <li><a href="#">Research & Innovation</a></li>
            <li><a href="#">Academic Calender</a></li>
        </ul>
    </li>
    <li class="has-dropdown">
        <a href="javascript:void()">Alumni</a>
        <ul class="submenu">
            <li><a href="#">Alumni Networks</a></li>
            <li><a href="#">Alumni Activities</a></li>
            <li><a href="#">Give Back / Support CASTO</a></li>
        </ul>
    </li>
    <li class="has-dropdown">
        <a href="javascript:void()">Portals</a>
        <ul class="submenu">
            <li><a href="#">Student Portal</a></li>
            <li><a href="#">Staff Portal</a></li>
            <li><a href="#">Transcript Portal</a></li>
        </ul>
    </li>
    <li><a href="{{ route('website.contact') }}">Get in Touch</a></li>
</ul>
@if(\App\Http\Services\HelperService::getSettings()->is_registration_on)
    <div class="header__btn header__btn-2 w-100 d-sm-none d-block">
        <a href="{{ route('website.application') }}" class="e-btn w-100 p-0">Apply Now</a>
    </div>
@else
    <div class="header__btn header__btn-2 w-100 d-sm-none d-block">
        <a class="e-btn w-100 p-0" style="cursor: not-allowed;">Application Closed</a>
    </div>
@endif
