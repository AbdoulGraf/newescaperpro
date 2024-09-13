<!--begin::Step 1-->
<div class="current" data-kt-stepper-element="content">
    <div class="w-100">
        <!--begin::Input group-->
        <div class="fv-row mb-15" data-kt-buttons="true">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 mb-6 ">
                <!--begin::Input-->
                <input class="btn-check" type="radio" name="place_id" value="2" />
                <!--end::Input-->
                <!--begin::Label-->
                <span class="d-flex">
				<!--begin::Icon-->
				{!! getSvgIcon('duotune/communication/com001.svg', 'svg-icon svg-icon-3hx') !!}
                    <!--end::Icon-->
				<!--begin::Info-->
				<span class="ms-4">
					<span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Abudhabi</span>
					<span class="fw-semibold fs-4 text-muted">Abudhabi games</span>
				</span>
                    <!--end::Info-->
                </span>
                <!--end::Label-->
            </label>
            <!--end::Option-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-15" data-kt-buttons="true">
            <!--begin::Option-->
            <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6 mb-6 ">
                <!--begin::Input-->
                <input class="btn-check" type="radio" name="place_id" value="1" />
                <!--end::Input-->
                <!--begin::Label-->
                <span class="d-flex">
				<!--begin::Icon-->
				{!! getSvgIcon('duotune/communication/com001.svg', 'svg-icon svg-icon-3hx') !!}
                    <!--end::Icon-->
				<!--begin::Info-->
				<span class="ms-4">
					<span class="fs-3 fw-bold text-gray-900 mb-2 d-block">Dubai</span>
					<span class="fw-semibold fs-4 text-muted">Dubai games</span>
				</span>
                    <!--end::Info--></span>
                <!--end::Label-->
            </label>
            <!--end::Option-->

        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-5 fw-semibold mb-4">
                <span class="required">Payment Method</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Select payment method"></i>
            </label>
            <!--end::Label-->
            <!--begin:Options-->
            <div class="fv-row">
                <!--begin:Option-->
                <label class="d-flex flex-stack mb-5 cursor-pointer">
                    <!--begin:Label-->
                    <span class="d-flex align-items-center me-2">
						<!--begin:Icon-->
						<span class="symbol symbol-50px me-6">
							<span class="symbol-label bg-light-primary">
								<!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
								<span class="svg-icon svg-icon-1 svg-icon-primary">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path opacity="0.3" d="M18.4 5.59998C21.9 9.09998 21.9 14.8 18.4 18.3C14.9 21.8 9.2 21.8 5.7 18.3L18.4 5.59998Z" fill="currentColor" />
										<path d="M12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2ZM19.9 11H13V8.8999C14.9 8.6999 16.7 8.00005 18.1 6.80005C19.1 8.00005 19.7 9.4 19.9 11ZM11 19.8999C9.7 19.6999 8.39999 19.2 7.39999 18.5C8.49999 17.7 9.7 17.2001 11 17.1001V19.8999ZM5.89999 6.90002C7.39999 8.10002 9.2 8.8 11 9V11.1001H4.10001C4.30001 9.4001 4.89999 8.00002 5.89999 6.90002ZM7.39999 5.5C8.49999 4.7 9.7 4.19998 11 4.09998V7C9.7 6.8 8.39999 6.3 7.39999 5.5ZM13 17.1001C14.3 17.3001 15.6 17.8 16.6 18.5C15.5 19.3 14.3 19.7999 13 19.8999V17.1001ZM13 4.09998C14.3 4.29998 15.6 4.8 16.6 5.5C15.5 6.3 14.3 6.80002 13 6.90002V4.09998ZM4.10001 13H11V15.1001C9.1 15.3001 7.29999 16 5.89999 17.2C4.89999 16 4.30001 14.6 4.10001 13ZM18.1 17.1001C16.6 15.9001 14.8 15.2 13 15V12.8999H19.9C19.7 14.5999 19.1 16.0001 18.1 17.1001Z" fill="currentColor" />
									</svg>
								</span>
                                <!--end::Svg Icon-->
							</span>
						</span>
                        <!--end:Icon-->
                        <!--begin:Info-->
						<span class="d-flex flex-column">
							<span class="fw-bold fs-6">Pay Upon Arrival</span>
							<span class="fs-7 text-muted">Tick this option if customer want to pay upon arrival</span>
						</span>
                        <!--end:Info-->
					</span>
                    <!--end:Label-->
                    <!--begin:Input-->
                    <span class="form-check form-check-custom form-check-solid">
						<input class="form-check-input" type="radio" name="payment_method" value="1" checked/>
					</span>
                    <!--end:Input-->
                </label>
                <!--end::Option-->

            </div>
            <!--end:Options-->
        </div>
        <!--end::Input group-->
    </div>
</div>
<!--end::Step 1-->
