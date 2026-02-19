<?php

namespace api\controllers;

use api\files\{
    FileStore
};

use app\models\upload\{
    Image
};

use Exception;

use Intervention\Image\ImageManager;

use Psr\Container\{
    ContainerExceptionInterface,
    NotFoundExceptionInterface
};

use Psr\Http\Message\{
    ServerRequestInterface as Request,
    ResponseInterface as Response
};

class ImageController extends BaseController {

    /**
     * @param Request $request
     * @param Response $response
     *
     * @return Response
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(Request $request, Response $response) : Response {

        /**
         * Validating -> Uploaded file is not empty!
         */
        if (!$upload = $request->getUploadedFiles()['file'] ?? null) {

            $data['error'] = 'Oops! ...it looks like you forgot to add an image?';
            return $response->withJson($data, 422);
        }

        /**
         * Validating -> Uploaded file is actually an image!?
         */
        try {

            $this->container->get(ImageManager::class)->make($upload->file);

        } catch (Exception $error) {

            $data['error'] = 'File-type not accepted';
            return $response->withJson($data, 415);
        }

        /**
         * IF validations above has been passed successfully
         * ...we then proceed storing the image
         */
        $store = (new FileStore())->store($upload);

        return $response->withJson([

            'data' => [

                'info' => "Image uploaded to server!...",
                'uuid' => $store->getStored()->uuid
            ]
        ]);
    }

    public function show(Request $request, Response $response, $uuid) {

        try {

            $image = Image::with([])->where('uuid', '=', $uuid)->firstOrFail();

        } catch (Exception $e) {

            return $response->withStatus(404);
        }

        $response->getBody()->write(

            $this->getProcessedImage($image, $request)
        );

        return $this->respondWithHeaders($response);
    }

    /**
     * @param $image
     * @param $request
     *
     * @return ImageManager
     *
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getProcessedImage($image, $request) {

        return $this->container->get(ImageManager::class)->cache(function ($builder) use ($image, $request) {

            $this->processImage(
                $builder->make(upload_image_path($image->uuid)),
                $request
            );
        });
    }

    protected function processImage($builder, $request) {

        return $builder->resize(null, $this->getRequestedSize($request), function ($constraint) {

            $constraint->aspectRatio();

        })->encode('png');
    }

    protected function getRequestedSize($request) {

        return max(min($request->getParam('size'), 2160) ?? 100, 10);
    }

    /**
     * @param $response
     *
     * @return mixed
     */
    protected function respondWithHeaders($response) {

        foreach ($this->getResponseHeaders() as $header => $value) {

            $response = $response->withHeader($header, $value);
        }

        return $response;
    }

    /**
     * @return string[]
     */
    protected function getResponseHeaders(): array {

        return [

            'Content-Type' => 'image/png'
        ];
    }
}
