<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;

class AddImageWatermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcment_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($announcment_image_id)
    {
        $this->announcment_image_id = $announcment_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcment_image_id);
        if(!$i){
            return;
        }
        
        $srcPath = storage_path('app/public/'. $i->path);
        $image = file_get_contents($srcPath);

        $image = SpatieImage::load($srcPath);

        $image->watermark(base_path('resources\img\Risorsa-1.png'))
              ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
              ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
              ->watermarkHeight(25, Manipulations::UNIT_PIXELS)
              ->watermarkWidth(25, Manipulations::UNIT_PIXELS);
            
        $image->save($srcPath);
    }
}
