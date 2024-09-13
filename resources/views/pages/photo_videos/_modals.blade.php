<!-- Begin::Modal - Add Photo/Video -->
<div class="modal fade" id="kt_modal_add_photo_videos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Add New Photo/Video</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <!-- SVG for closing modal -->
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="kt_modal_add_form_photo_video" class="form" action="{{ route('admin.photos_videos.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="fv-row mb-7">
                        <label class="required form-label">Image/Video Name:</label>
                        <input type="text" name="image_or_video_name" class="form-control form-control-solid" placeholder="Enter image or video name" required/>
                    </div>
                    
                    <div class="fv-row mb-7">
                        <label class="required form-label">Place:</label>
                        <select name="place_for" class="form-select form-select-solid" required>
                            <option value="">Select a place</option>
                            <option value="Dubai">Dubai</option>
                            <option value="Abu Dhabi">Abu Dhabi</option>
                            <option value="All">All</option>
                        </select>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required form-label">Room:</label>
                        <select name="room_id" class="form-select form-select-solid" required>
                            <option value="">Select a Room</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="fv-row mb-7">
                        <label class="form-label">Photo Image (optional):</label>
                        <input type="file" name="photo_img" class="form-control form-control-solid" accept="image/*"/>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label">Video MP4 (optional):</label>
                        <input type="file" name="video_mp4" class="form-control form-control-solid" accept="video/mp4"/>
                    </div>
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End::Modal - Add Photo/Video -->
