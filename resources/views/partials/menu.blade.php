<aside id="sidebar">

    {{-- BRAND --}}
    <div class="sidebar-brand">
        <div class="brand-area">
            <div class="brand-icon">
                <i class="fas fa-bolt"></i>
            </div>

            <span class="brand-text">
                {{ trans('panel.site_title') }}
            </span>
        </div>
    </div>

    {{-- USER MINI CARD --}}
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div class="user-meta">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <p class="user-role">Administrator</p>
        </div>
    </div>

    {{-- NAV --}}
    <nav class="sidebar-nav">

        <p class="sidebar-section-title nav-label">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('admin.home') }}"
           data-tooltip="Dashboard"
           class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <i class="fas fa-chart-pie nav-icon"></i>
            <span class="nav-label">{{ trans('global.dashboard') }}</span>
        </a>

         {{-- ── USER MANAGEMENT GROUP ── --}}
        @can('user_management_access')
        @php
        $umActive = request()->is('admin/permissions*') || request()->is('admin/roles*') || request()->is('admin/users*') || request()->is('admin/audit-logs*');
        @endphp
        <div x-data="{ open: {{ $umActive ? 'true' : 'false' }} }">

            <button @click="open = !open" data-tooltip="Users"
                class="nav-link {{ $umActive ? 'active' : '' }}"
                style="justify-content: space-between;">
                <div style="display:flex; align-items:center; gap:10px;">
                    <i class="fas fa-users nav-icon" style="color:{{ $umActive ? '#fff' : '#64748B' }};"></i>
                    <span class="nav-label">{{ trans('cruds.userManagement.title') }}</span>
                </div>
                <i class="fas fa-chevron-right chevron" style="font-size:10px; color:#475569; transition:transform .2s;"
                   :style="open ? 'transform:rotate(90deg)' : ''"></i>
            </button>

            <div class="submenu" x-show="open"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-1">

                @can('permission_access')
                <a href="{{ route('admin.permissions.index') }}"
                   class="sub-link {{ request()->is('admin/permissions*') ? 'active' : '' }}">
                    <i class="fas fa-key" style="margin-right:7px; font-size:11px; color:#475569;"></i>
                    {{ trans('cruds.permission.title') }}
                </a>
                @endcan

                @can('role_access')
                <a href="{{ route('admin.roles.index') }}"
                   class="sub-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                    <i class="fas fa-shield-alt" style="margin-right:7px; font-size:11px; color:#475569;"></i>
                    {{ trans('cruds.role.title') }}
                </a>
                @endcan

                @can('user_access')
                <a href="{{ route('admin.users.index') }}"
                   class="sub-link {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="fas fa-user-circle" style="margin-right:7px; font-size:11px; color:#475569;"></i>
                    {{ trans('cruds.user.title') }}
                </a>
                @endcan

                @can('audit_log_access')
                <a href="{{ route('admin.audit-logs.index') }}"
                   class="sub-link {{ request()->is('admin/audit-logs*') ? 'active' : '' }}">
                    <i class="fas fa-history" style="margin-right:7px; font-size:11px; color:#475569;"></i>
                    {{ trans('cruds.auditLog.title') }}
                </a>
                @endcan

            </div>
        </div>
        @endcan

      {{-- ── DIVIDER ── --}}
<div style="height:1px; background:rgba(255,255,255,.05); margin:6px 4px;"></div>

{{-- FAQs --}}
@can('faq_access')
<a href="{{ route('admin.faqs.index') }}"
   data-tooltip="FAQs"
   class="nav-link {{ request()->is('admin/faqs*') ? 'active' : '' }}">
    <i class="fas fa-question-circle nav-icon"
       style="color:{{ request()->is('admin/faqs*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">FAQs</span>
</a>
@endcan

<p style="font-size:10px; font-weight:700; color:#334155; text-transform:uppercase; letter-spacing:.08em; padding:4px 10px; margin:0;"
   class="nav-label">
    Website
</p>


{{-- Website Settings --}}
@can('website_setting_access')
<a href="{{ route('admin.website-settings.index') }}"
   data-tooltip="Website Settings"
   class="nav-link {{ request()->is('admin/website-settings*') ? 'active' : '' }}">
    <i class="fas fa-cog nav-icon"
       style="color:{{ request()->is('admin/website-settings*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Website Settings</span>
</a>
@endcan


{{-- About Page --}}
@can('about_page_access')
<a href="{{ route('admin.about-pages.index') }}"
   data-tooltip="About Page"
   class="nav-link {{ request()->is('admin/about-pages*') ? 'active' : '' }}">
    <i class="fas fa-info-circle nav-icon"
       style="color:{{ request()->is('admin/about-pages*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">About Page</span>
</a>
@endcan


{{-- Facilities --}}
@can('facility_access')
<a href="{{ route('admin.facilities.index') }}"
   data-tooltip="Facilities"
   class="nav-link {{ request()->is('admin/facilities*') ? 'active' : '' }}">
    <i class="fas fa-hospital nav-icon"
       style="color:{{ request()->is('admin/facilities*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Facilities</span>
</a>
@endcan


{{-- ── DIVIDER ── --}}
<div style="height:1px; background:rgba(255,255,255,.05); margin:6px 4px;"></div>

<p style="font-size:10px; font-weight:700; color:#334155; text-transform:uppercase; letter-spacing:.08em; padding:4px 10px; margin:0;"
   class="nav-label">
    Clinic
</p>


{{-- Services --}}
@can('service_access')
<a href="{{ route('admin.services.index') }}"
   data-tooltip="Services"
   class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}">
    <i class="fas fa-tooth nav-icon"
       style="color:{{ request()->is('admin/services*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Services</span>
</a>
@endcan


{{-- Doctors --}}
@can('doctor_access')
<a href="{{ route('admin.doctors.index') }}"
   data-tooltip="Doctors"
   class="nav-link {{ request()->is('admin/doctors*') ? 'active' : '' }}">
    <i class="fas fa-user-md nav-icon"
       style="color:{{ request()->is('admin/doctors*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Doctors</span>
</a>
@endcan


{{-- Gallery / Results --}}
@can('gallery_access')
<a href="{{ route('admin.galleries.index') }}"
   data-tooltip="Gallery / Results"
   class="nav-link {{ request()->is('admin/galleries*') ? 'active' : '' }}">
    <i class="fas fa-images nav-icon"
       style="color:{{ request()->is('admin/galleries*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Gallery / Results</span>
</a>
@endcan


{{-- Patient Reviews --}}
@can('patient_review_access')
<a href="{{ route('admin.patient-reviews.index') }}"
   data-tooltip="Patient Reviews"
   class="nav-link {{ request()->is('admin/patient-reviews*') ? 'active' : '' }}">
    <i class="fas fa-star nav-icon"
       style="color:{{ request()->is('admin/patient-reviews*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Patient Reviews</span>
</a>
@endcan


{{-- ── DIVIDER ── --}}
<div style="height:1px; background:rgba(255,255,255,.05); margin:6px 4px;"></div>

<p style="font-size:10px; font-weight:700; color:#334155; text-transform:uppercase; letter-spacing:.08em; padding:4px 10px; margin:0;"
   class="nav-label">
    Enquiries
</p>


{{-- Appointment Enquiries --}}
@can('appointment_enquiry_access')
<a href="{{ route('admin.appointment-enquiries.index') }}"
   data-tooltip="Appointment Enquiries"
   class="nav-link {{ request()->is('admin/appointment-enquiries*') ? 'active' : '' }}">
    <i class="fas fa-calendar-check nav-icon"
       style="color:{{ request()->is('admin/appointment-enquiries*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Appointment Enquiries</span>
</a>
@endcan


{{-- Contact Enquiries --}}
@can('contact_enquiry_access')
<a href="{{ route('admin.contact-enquiries.index') }}"
   data-tooltip="Contact Enquiries"
   class="nav-link {{ request()->is('admin/contact-enquiries*') ? 'active' : '' }}">
    <i class="fas fa-envelope-open-text nav-icon"
       style="color:{{ request()->is('admin/contact-enquiries*') ? '#fff' : '#64748B' }};"></i>
    <span class="nav-label">Contact Enquiries</span>
</a>
@endcan
        <div class="nav-divider"></div>

        <p class="sidebar-section-title compact nav-label">Account</p>

        {{-- Change Password --}}
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <a href="{{ route('profile.password.edit') }}"
                   data-tooltip="Password"
                   class="nav-link {{ request()->is('profile/password*') ? 'active' : '' }}">
                    <i class="fas fa-key nav-icon"></i>
                    <span class="nav-label">{{ trans('global.change_password') }}</span>
                </a>
            @endcan
        @endif

        {{-- Settings --}}
        <a href="#"
           data-tooltip="Settings"
           class="nav-link">
            <i class="fas fa-cog nav-icon"></i>
            <span class="nav-label">Settings</span>
        </a>

    </nav>

    {{-- LOGOUT --}}
    <div class="sidebar-footer">
        <a href="#"
           onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
           data-tooltip="Logout"
           class="nav-link logout-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
            <span class="nav-label">{{ trans('global.logout') }}</span>
        </a>
    </div>

</aside>
