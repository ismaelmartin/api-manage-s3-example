<?php

use Symfony\Component\HttpFoundation\Request;

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

error_reporting(E_ALL);

require_once __DIR__.'/../../../../../vendor/autoload.php';

$app = \Infrastructure\API\Silex\Application::bootstrap();

$app->get('/', function () use ($app) {
    return json_encode([
        'api' => 'privalia S3',
        'version' => '0.1',
    ]);
})->bind('api_info');

$app->get('/list', function (Request $request) use ($app) {

    $bucketDto = new \Application\Dto\BucketDto(
        $request->headers->get('name'),
        $request->headers->get('key'),
        $request->headers->get('secret'),
        $request->headers->get('region'),
        $request->headers->get('version'),
        $request->headers->get('profile')
    );
    $command = new \Application\Command\ListBucketCommand($bucketDto);
    $handler = new \Application\Command\ListBucketCommandHandler();
    $list = $handler($command);

    return json_encode(["files" => $list]);
})->bind('list');

$app->post('/upload', function (Request $request) use ($app) {

    $file = $request->files->get('file');
    $fileName = $request->request->get('filename');
    $bucketDto = new \Application\Dto\BucketDto(
        $request->request->get('name'),
        $request->request->get('key'),
        $request->request->get('secret'),
        $request->request->get('region'),
        $request->request->get('version'),
        $request->request->get('profile')
    );
    $command = new \Application\Command\UploadFileCommand($file, $fileName, $bucketDto);
    $handler = new \Application\Command\UploadFileCommandHandler();
    $response = $handler($command);

    return json_encode(["error" => 0, 'message' => "file uploaded."]);
})->bind('upload');

$app->run();
