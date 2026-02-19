<?php

namespace api\files;

use Exception;

use app\models\upload\Image;

use Illuminate\Database\Eloquent\{
    Builder,
    Model
};

use Slim\Http\UploadedFile;

class FileStore {

    protected $stored = null;

    /**
     * @return mixed|null
     */
    public function getStored() {

        return $this->stored;
    }

    /**
     * @param UploadedFile $file
     *
     * @return $this|void
     */
    public function store(UploadedFile $file) {

        try {

            $model = $this->createModel();
            $file->moveTo(upload_image_path($model->uuid));

        } catch (Exception $error) {

            dump($error);
            die;
        }

        return $this;
    }

    /**
     * @return Builder|Model
     */
    protected function createModel() {

        return $this->stored = Image::with([])->create();
    }
}
