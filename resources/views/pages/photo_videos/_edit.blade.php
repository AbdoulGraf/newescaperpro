<x-default-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Photo/Video</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.photos_videos.update', $photovideo->id) }}" class="bg-light p-4 rounded">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label class="required form-label">Image/Video Name:</label>
                <input type="text" name="image_or_video_name" class="form-control" placeholder="Enter image or video name" value="{{ $photovideo->name }}" required/>
            </div>

            <div class="mb-3">
                <label class="required form-label">Place:</label>
                <select name="place_for" class="form-select" required>
                    <option value="">Select a place</option>
                    <option value="Dubai" @selected($photovideo->place_for == 'Dubai')>Dubai</option>
                    <option value="Abu Dhabi" @selected($photovideo->place_for == 'Abu Dhabi')>Abu Dhabi</option>
                    <option value="All" @selected($photovideo->place_for == 'All')>All</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="required form-label">Room:</label>
                <select name="room_id" class="form-select" required>
                    <option value="">Select a Room</option>
                    @foreach ($rooms as $room)
                        <option value="{{ $room->id }}" @selected($photovideo->room_id == $room->id)>{{ $room->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo Image (optional):</label>
                <input type="file" name="photo_img" class="form-control" accept="image/*"/>
                @if($photovideo->photos_img)
                    <div class="mt-2">
                        <img src="{{ Storage::url($photovideo->photos_img) }}" alt="Room Photo" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Video MP4 (optional):</label>
                <input type="file" name="video_mp4" class="form-control" accept="video/mp4"/>
                @if($photovideo->videos_mp4)
                    <div class="mt-2">
                        <video width="320" height="240" controls class="mb-2">
                            <source src="{{ Storage::url($photovideo->videos_mp4) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</x-default-layout>
