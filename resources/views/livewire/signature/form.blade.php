<div>
    <form class="form w-100" id="signatureForm" action="{{route('signature.store')}}">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-start flex-xxl-row">
            <!--begin::Input group-->
            <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Specify reservation date">
                <!--begin::Date-->
                <div class="fs-6 fw-bold text-gray-700 text-nowrap">Date:</div>
                <!--end::Date-->
                <!--begin::Input-->
                <div class="position-relative d-flex align-items-center w-150px">
                    <!--begin::Datepicker-->
                    <input wire:model.lazy="reservation_date" name="reservation_date" class="form-control form-control-transparent fw-bold pe-5" placeholder="Select date" required/>
                    <!--end::Datepicker-->
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-down fs-4 position-absolute ms-4 end-0"></i>
                    <!--end::Icon-->
                    @if($errors->has('reservation_date')) <span class="text-danger">{{ $errors->first('reservation_date') }}</span> @endif
                </div>
                <!--end::Input-->
            </div>
            <!--end::Input group-->

            <div class="align-items-end d-flex float-end fw-row me-4 order-2">
                <button type="submit" class="btn btn-success btn-outline-secondary" id="kt_signature_submit_button">Send</button>
            </div>

        </div>
        <!--end::Top-->
        <!--begin::Separator-->
        <div class="separator separator-dashed my-10"></div>
        <!--end::Separator-->
        <!--begin::Wrapper-->
        <div class="mb-0">

            <!--begin::Row-->
            <div class="row gx-10 mb-5">
                <!--begin::Col-->
                <div class="col-lg-12">
                    <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Personel Information</label>
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Name" value="{{ old('first_name') }}" wire:model.lazy="first_name" required/>
                        @if($errors->has('first_name')) <span class="text-danger">{{ $errors->first('first_name') }}</span> @endif
                    </div>
                    <!--begin::Input group-->
                    <div class="mb-5 me-3">
                        <input name="last_name" type="text" class="form-control form-control-solid" placeholder="Surname" value="{{ old('last_name') }}" wire:model.lazy="last_name" required/>
                        @if($errors->has('last_name')) <span class="text-danger">{{ $errors->first('last_name') }}</span> @endif
                    </div>
                    <!--end::Input group-->
                    <div class="mb-5">
                        <input name="email" type="text" class="form-control form-control-solid" placeholder="Email" value="{{ old('email') }}" wire:model.lazy="email" required/>
                        @if($errors->has('email')) <span class="text-danger">{{ $errors->first('email') }}</span> @endif
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <input name="phone" type="text" class="form-control form-control-solid" placeholder="Phone" value="{{ old('phone') }}" wire:model.lazy="phone" required/>
                        @if($errors->has('phone')) <span class="text-danger">{{ $errors->first('phone') }}</span> @endif
                    </div>
                    <!--end::Input group-->

                    <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Room Detail</label>
                    <!--begin::Input group-->
                    <div class="mb-5">
                        <!--begin::Select-->
                        <select wire:model.lazy="room_id" name="room_id" aria-label="Select a Room" data-control="select2" data-placeholder="Select room" class="form-select form-select-solid" required>
                            @foreach($rooms as $item)
                                <option value="{{$item->id}}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                        <!--end::Select-->

                        @if($errors->has('room_id')) <span class="text-danger">{{ $errors->first('room_id') }}</span> @endif
                    </div>
                    <!--end::Input group-->

                    <!--begin::Separator-->
                    <div class="separator separator-dashed mb-8"></div>
                    <!--end::Separator-->
                    <!--begin::Input group-->
                    <div class="mb-8">
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                            <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                <a href="https://www.escapehouseuae.com/terms" target="_blank">Terms & Conditions</a>
                            </span>
                            <input name="terms" class="form-check-input" type="checkbox" checked="checked" value="1" wire:model.lazy="terms" required/>
                            @if($errors->has('terms')) <span class="text-danger">{{ $errors->first('terms') }}</span> @endif

                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                            <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                <a href="https://www.escapehouseuae.com/privacy" target="_blank">Privacy Policy</a>
                            </span>
                            <input name="privacy" class="form-check-input" type="checkbox" checked="checked" value="1" wire:model.lazy="privacy" required/>
                            @if($errors->has('privacy')) <span class="text-danger">{{ $errors->first('privacy') }}</span> @endif
                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                            <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                <a href="https://www.escapehouseuae.com/" target="_blank">Refund Policy</a>
                            </span>
                            <input name="refund" class="form-check-input" type="checkbox" checked="checked" value="1" wire:model.lazy="refund" required/>
                        </label>
                        <!--end::Option-->
                        <!--begin::Option-->
                        <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                            <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                <a href="https://www.escapehouseuae.com/liability" target="_blank">Disclaimer And Liability</a>
                            </span>
                            <input name="liability" class="form-check-input" type="checkbox" checked="checked" value="1" wire:model.lazy="liability" required/>
                            @if($errors->has('liability')) <span class="text-danger">{{ $errors->first('liability') }}</span> @endif
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Col-->

            </div>
            <!--end::Row-->
            <!--begin::Notes-->
            <div class="mb-0 ">
                <!--begin::Input group-->
                <div class="mb-5" style="position: relative;">
                    <label for="signature" style="position: absolute; font-size: 1rem; top:1rem;left:1rem; font-weight:600; ">Signature</label>
                    <canvas id="signature" class="form-control form-control-solid" style="background-color: #f9f9f9; border:none"></canvas>
                    <a href="javascript:void(0);" id="removeSign" class="link-warning">Clear</a>
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Notes-->
        </div>
        <!--end::Wrapper-->
    </form>
</div>
