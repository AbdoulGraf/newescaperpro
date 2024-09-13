<!--begin::Step 3-->
<div data-kt-stepper-element="content">
    <div class="w-100">
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="required fs-5 fw-semibold mb-2">Number of Players</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="number" min="1" max="11" class="form-control form-control-lg form-control-solid"
                id="playerNum" name="players" placeholder="Number of Players" />
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="fv-row mb-200">
            <!--begin::Label-->
            <label class="required fs-6 fw-semibold mb-2">Reservation Date</label>
            <!--end::Label-->
            <!--begin::Wrapper-->
            <div class="position-relative d-flex align-items-center">
                <!--begin::Icon-->
                {!! getSvgIcon('duotune/general/gen014.svg', 'svg-icon svg-icon-2 position-absolute mx-4') !!}
                <!--end::Icon-->
                <!--begin::Input-->

                <input class="form-control form-control-solid ps-12" placeholder="Pick a date" name="reservation_date"
                    id="reservationDate" />

                <!--end::Input-->
            </div>
        </div>
        <!--end::Input group-->


        <!--begin::Input group-->
        <div class="fv-row mb-20">
            <!--begin::Label-->
            <label class="required fs-6 fw-semibold mb-2">Reservation Hour</label>
            <!--end::Label-->
            <!--begin::Wrapper-->
            <div class="position-relative align-items-center">
                <div class="form-group">
                    <div class="radio-list  d-grid">
                        <div id="hourOptions"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Input group-->



    </div>

</div>
<!--end::Step 3-->
