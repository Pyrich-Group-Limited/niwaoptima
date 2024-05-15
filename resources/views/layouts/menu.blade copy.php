<style>
	.spicyj {
		font-size: 14px;
		font-weight: bold;
	}

	.menu-link {
		display: inline-block;
		padding: 10px 15px;
		border-radius: 5px;
		/* background-color: #fff; */
		text-decoration: none;
		color: #000;
		transition: background-color 0.3s ease;
	}

	.menu-link:hover {
		background-color: #198758;
		border-radius: 12px;
		padding: 10px;
		color: white
	}
</style>

@php
$departmentData = getDepartmentData();
@endphp

<!-- Begin::Menu-Code -->
<div class="aside-menu flex-column-fluid">
	<!--begin::Aside Menu-->
	<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
		<!--begin::Menu-->
		<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
			<a class="menu-link" href="{{ route('home') }}">
				<div class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">

							<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title spicyj">Dashboards</span>
						<!-- <span class="menu-arrow"></span> -->
					</span>
			</a>
		</div>

		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor" />
							<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">My Task</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				@if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck1']))

				@include('employermanager::layouts.menu')
				@endif

			</div>
		</div>
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z" fill="currentColor" />
							<path d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Operational Task</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				@include('documentmanager::layouts.menu')



			</div>
		</div>
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/art/art009.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M21 18.3V4H20H5C4.4 4 4 4.4 4 5V20C10.9 20 16.7 15.6 19 9.5V18.3C18.4 18.6 18 19.3 18 20C18 21.1 18.9 22 20 22C21.1 22 22 21.1 22 20C22 19.3 21.6 18.6 21 18.3Z" fill="currentColor" />
							<path d="M22 4C22 2.9 21.1 2 20 2C18.9 2 18 2.9 18 4C18 4.7 18.4 5.29995 18.9 5.69995C18.1 12.6 12.6 18.2 5.70001 18.9C5.30001 18.4 4.7 18 4 18C2.9 18 2 18.9 2 20C2 21.1 2.9 22 4 22C4.8 22 5.39999 21.6 5.79999 20.9C13.8 20.1 20.1 13.7 20.9 5.80005C21.6 5.40005 22 4.8 22 4Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Approval</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				@include('approval::layouts.menu')
			</div>
		</div>
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M11.2929 2.70711C11.6834 2.31658 12.3166 2.31658 12.7071 2.70711L15.2929 5.29289C15.6834 5.68342 15.6834 6.31658 15.2929 6.70711L12.7071 9.29289C12.3166 9.68342 11.6834 9.68342 11.2929 9.29289L8.70711 6.70711C8.31658 6.31658 8.31658 5.68342 8.70711 5.29289L11.2929 2.70711Z" fill="currentColor" />
							<path d="M11.2929 14.7071C11.6834 14.3166 12.3166 14.3166 12.7071 14.7071L15.2929 17.2929C15.6834 17.6834 15.6834 18.3166 15.2929 18.7071L12.7071 21.2929C12.3166 21.6834 11.6834 21.6834 11.2929 21.2929L8.70711 18.7071C8.31658 18.3166 8.31658 17.6834 8.70711 17.2929L11.2929 14.7071Z" fill="currentColor" />
							<path opacity="0.3" d="M5.29289 8.70711C5.68342 8.31658 6.31658 8.31658 6.70711 8.70711L9.29289 11.2929C9.68342 11.6834 9.68342 12.3166 9.29289 12.7071L6.70711 15.2929C6.31658 15.6834 5.68342 15.6834 5.29289 15.2929L2.70711 12.7071C2.31658 12.3166 2.31658 11.6834 2.70711 11.2929L5.29289 8.70711Z" fill="currentColor" />
							<path opacity="0.3" d="M17.2929 8.70711C17.6834 8.31658 18.3166 8.31658 18.7071 8.70711L21.2929 11.2929C21.6834 11.6834 21.6834 12.3166 21.2929 12.7071L18.7071 15.2929C18.3166 15.6834 17.6834 15.6834 17.2929 15.2929L14.7071 12.7071C14.3166 12.3166 14.3166 11.6834 14.7071 11.2929L17.2929 8.70711Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Others</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				<div class="menu-item">
					<a class="menu-link" href="../../demo1/dist/widgets/lists.html">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Lists</span>
					</a>
				</div>



				<div class="menu-item">
					<a class="menu-link" href="../../demo1/dist/widgets/feeds.html">
						<span class="menu-bullet">
							<span class="bullet bullet-dot"></span>
						</span>
						<span class="menu-title">Feeds</span>
					</a>
				</div>
			</div>
		</div>
		<div class="menu-item">
			<div class="menu-content pt-8 pb-2">
				<span class="menu-section text-muted text-uppercase fs-8 ls-1">GENERAL TASK</span>
			</div>
		</div>
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z" fill="currentColor" />
							<path d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Tags</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				{{-- @if (in_array(Auth()->user()->staff->department_id, $departmentData['hrIdToCheck'])) --}}
				@include('dtarequests::layouts.menu')
				{{-- @endif --}}

				@include('humanresource::layouts.menu')

				@if (in_array(Auth()->user()->staff->department_id, $departmentData['hrIdToCheck']) || $departmentData['loggedInUserId'] == 1)
				@include('layouts.user')
				@endif

			</div>
		</div>
		@if ((auth()->user()->staff->department_id==6)|| auth()->user()->hasRole('super-admin'))

		@include('accounting::layouts.menu')
		@endif
		@include('hrmsystem::layouts.menu')

		@if ((auth()->user()->staff->department_id==5) || auth()->user()->hasRole('super-admin'))

		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="currentColor" />
							<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Reports </span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				{{-- @if (in_array(Auth()->user()->staff->department_id, $departmentData['departmentIdsToCheck1'])) --}}
				{{-- @include('accounting::layouts.menu') --}}
				@include('accounting::layouts.reportmenu')


			</div>
		</div>

		@endif



		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor" />
							<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">MailBox</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				@include('layouts.mailmenu')
			</div>
		</div>
		<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
							<rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
							<rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Inter-Com</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				@include('intercomm.menu')

			</div>
		</div>
		@include('formbuilder::layouts.menu')
		<div class="menu-item">
			<!--begin:Menu link-->
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M13 5.91517C15.8 6.41517 18 8.81519 18 11.8152C18 12.5152 17.9 13.2152 17.6 13.9152L20.1 15.3152C20.6 15.6152 21.4 15.4152 21.6 14.8152C21.9 13.9152 22.1 12.9152 22.1 11.8152C22.1 7.01519 18.8 3.11521 14.3 2.01521C13.7 1.91521 13.1 2.31521 13.1 3.01521V5.91517H13Z" fill="currentColor" />
							<path opacity="0.3" d="M19.1 17.0152C19.7 17.3152 19.8 18.1152 19.3 18.5152C17.5 20.5152 14.9 21.7152 12 21.7152C9.1 21.7152 6.50001 20.5152 4.70001 18.5152C4.30001 18.0152 4.39999 17.3152 4.89999 17.0152L7.39999 15.6152C8.49999 16.9152 10.2 17.8152 12 17.8152C13.8 17.8152 15.5 17.0152 16.6 15.6152L19.1 17.0152ZM6.39999 13.9151C6.19999 13.2151 6 12.5152 6 11.8152C6 8.81517 8.2 6.41515 11 5.91515V3.01519C11 2.41519 10.4 1.91519 9.79999 2.01519C5.29999 3.01519 2 7.01517 2 11.8152C2 12.8152 2.2 13.8152 2.5 14.8152C2.7 15.4152 3.4 15.7152 4 15.3152L6.39999 13.9151Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<a href="{{ route('support.index') }}">
					<span class="menu-title spicyj">Support System</span>
				</a>
			</span>
		</div>
		<div class="menu-item main-menu-item">


		</div>

		<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
			<span class="menu-link">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/general/gen009.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M21 22H14C13.4 22 13 21.6 13 21V3C13 2.4 13.4 2 14 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22Z" fill="currentColor" />
							<path d="M10 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H10C10.6 2 11 2.4 11 3V21C11 21.6 10.6 22 10 22Z" fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
				<span class="menu-title spicyj">Settings</span>
				<span class="menu-arrow"></span>
			</span>
			<div class="menu-sub menu-sub-accordion menu-active-bg">
				<span class="menu-link">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
						<span class="menu-bullet">
							<span class="fa fa-gear"></span>
						</span>
						<!--end::Svg Icon-->
					</span>
					<a href="{{ route('settings') }}">
						<span class="menu-title">System Settings</span>
					</a>
				</span>
				<a href="{{ route('change.email.password.form') }}" class="menu-link menu-toggle1">
					<span class="menu-icon">
						<!--begin::Svg Icon | path: icons/duotune/art/art002.svg-->
						<span class="svg-icon svg-icon-2">
							<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path opacity="0.3" d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z" fill="currentColor"></path>
								<path d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z" fill="currentColor"></path>
							</svg>
						</span>
						<!--end::Svg Icon-->
					</span>
					<span class="menu-title">Change Password</span>
				</a>

				<div class="menu-item">
					<a class="menu-link" href="../../demo1/dist/layouts/aside/only-header.html">
						<span class="menu-bullet">
							<span class="fa fa-user"></span>
						</span>
						<span class="menu-title">Account Settings</span>
					</a>
				</div>
			</div>
		</div>


	</div>
	<!--end::Menu-->
</div>
<!--end::Aside Menu-->
</div>

<!-- JavaScript Code -->
<script>
	// Function to close all dropdowns
	function closeAllDropdowns() {
		const dropdownMenus = document.querySelectorAll('.menu-item');

		dropdownMenus.forEach(dropdown => {
			dropdown.classList.remove('show');
		});
	}

	// Function to toggle dropdown on click
	function toggleDropdown(event) {
		const currentMenu = event.target.closest('.menu-item');
		const allMenus = document.querySelectorAll('.menu-item');

		allMenus.forEach(menu => {
			if (menu !== currentMenu && menu.classList.contains('show')) {
				menu.classList.remove('show');
			}
		});

		currentMenu.classList.toggle('show');
	}

	// Add click event listener to menu toggles
	const menuToggles = document.querySelectorAll('.menu-link.menu-toggle');
	menuToggles.forEach(toggle => {
		toggle.addEventListener('click', toggleDropdown);
	});

	// Close all dropdowns on load or reload
	window.addEventListener('load', closeAllDropdowns);
</script>
<script>
	// Function to toggle submenu
	function toggleSubmenu(event) {
		event.preventDefault(); // Prevent the default navigation behavior
		const targetId = event.target.getAttribute("data-toggle");
		const submenu = document.getElementById(targetId);

		if (submenu) {
			submenu.classList.toggle('show');
		}
	}

	// Add click event listener to submenu toggle buttons
	const submenuToggles = document.querySelectorAll('[data-toggle^="submenu-"]');
	submenuToggles.forEach(toggle => {
		toggle.addEventListener('click', toggleSubmenu);
	});
</script>