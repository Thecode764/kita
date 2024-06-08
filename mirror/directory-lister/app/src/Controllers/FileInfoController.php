<?php

namespace App\Controllers;

use App\Config;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use SplFileInfo;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class FileInfoController
{
    /** Create a new FileInfoHandler object. */
    public function __construct(
        private Config $config,
        private CacheInterface $cache,
        private TranslatorInterface $translator
    ) {}

    /** Invoke the FileInfoHandler. */
    public function __invoke(Request $request, Response $response): ResponseInterface
    {
        $path = $request->getQueryParams()['info'];
        $file = new SplFileInfo(
            (string)realpath($this->config->get('base_path'). '/'. $path)
        );

        if (!$file->isFile()) {
            return $response->withStatus(404, $this->translator->trans('error.file_not_found'));
        }

        if ($file->getSize() >= (int)$this->config->get('max_hash_size')) {
            return $response->withStatus(500, $this->translator->trans('error.file_size_exceeded'));
        }

        $response->getBody()->write($this->cache->get(
            sprintf('file-info-%s', sha256((string)$file->getRealPath())), // Changed to sha256
            function () use ($file): string {
                return (string)json_encode(['hashes' => $this->calculateHashes($file)]);
            }
        ));

        return $response->withHeader('Content-Type', 'application/json');
    }

    /** Get an array of hashes for a file. */
    protected function calculateHashes(SplFileInfo $file): array
    {
        return [
            'md5' => hash_file('md5', (string)$file->getRealPath()),
            'sha256' => hash_file('sha256', (string)$file->getRealPath()), // Ensure this is the only sha variant used
        ];
    }
}
