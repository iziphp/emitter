<?php

declare(strict_types=1);

namespace PhpStandard\Emitter;

use PhpStandard\Emitter\Traits\SapiEmitterTrait;
use PhpStandard\Http\ResponseEmitter\EmitterInterface;
use Psr\Http\Message\ResponseInterface;

/** @package PhpStandard\Emitter */
class SapiEmitter implements EmitterInterface
{
    use SapiEmitterTrait;

    /**
     * @inheritDoc
     */
    public function emit(ResponseInterface $response): void
    {
        $this->assertNoPreviousOutput();
        $this->emitStatusLine($response);
        $this->emitHeaders($response);
        $this->emitBody($response);
    }

    /**
     * Emit the response body
     *
     * @param ResponseInterface $response
     */
    private function emitBody(ResponseInterface $response): void
    {
        echo $response->getBody();
    }
}
