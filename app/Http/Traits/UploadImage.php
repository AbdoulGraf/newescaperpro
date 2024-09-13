<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadImage
{
    /**
     * @param $name
     * @param $dir
     * @param $file
     * @param null $key
     * @param null $rm
     * @param null $resize
     * @param string $format
     * @return string|null
     */
    public function createImage(array $params): ?string
    {
        $name = $params['name'];
        $dir = "storage/".$params['dir'];
        $file = $params['file'];
        $resize = $params['resize'] ?? null;
        $rm = $params['rm'] ?? null;
        $format = $params['format'] ?? "webp";

        try {
            // Create directory if not exists
            if(!File::exists($dir)) {
                File::makeDirectory($dir, 0777, true, true);
            }

            $imagePath = $dir.$name.".$format";

            // Check if the file exists and delete
            if(File::exists($imagePath)) {
                unlink(public_path($imagePath));
            }

            // If file is provided
            if($file !== null){
                // Handle base64 images
                if (str_starts_with($file, 'data:image')) {
                    $img = Image::make($file)->encode($format, 50);
                } else {
                    $img = Image::make($file->getRealPath())->encode($format, 50);
                }

                // Resize if necessary
                if($resize['w'] !== null || $resize['h'] !== null) {
                    $img->resize($resize['w'], $resize['h'], fn ($constraint) => $constraint->aspectRatio());
                }

                // Save image
                if(!$img->save(public_path($imagePath))->encode($format, 50)) {
                    throw new \Exception("Error saving image");
                }

                $image = $imagePath;

            } elseif($rm === "1" && $file === null) {
                // If file is not provided but rm flag is set
                $image = "storage/uploads/placeholder.jpg";
            } else {
                // If file is not provided and rm flag is not set
                $image = File::exists($imagePath) ? $imagePath : "b";
            }

            // Remove directory if it's empty
            if(File::exists($dir) and File::isEmptyDirectory($dir)) {
                File::deleteDirectory($dir);
            }

            return $image;

        } catch (\Exception $e) {
            return "Error: ".$e->getMessage();
        }
    }

    /**
     * Function for upload avatar image
     *
     * @param string $folder
     * @param string $key
     * @param string $validation
     *
     * @return false|string|null
     */
    public function uploadTracks(string $folder = 'uploads/soundscapes', string $key = 'files', string $validation = 'required|mimes:mp3,m4a,mp4,m4r|max:2048|sometimes'): bool|string|null
    {
        request()->validate([$key => $validation]);
        if (request()->hasFile($key)) $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
        return $file ?? null;
    }
}
