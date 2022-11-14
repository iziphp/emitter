<?php

declare(strict_types=1);

namespace PhpStandard\Emitter\Tests;

use Laminas\Diactoros\Response;
use PhpStandard\Emitter\EmitterInterface;
use PhpStandard\Emitter\Exceptions\HeadersAlreadySentException;
use PhpStandard\Emitter\SapiEmitter;
use PHPUnit\Framework\TestCase;

/** @package PhpStandard\Emitter\Tests */
class SapiEmitterTest extends TestCase
{
    protected EmitterInterface $emitter;

    /** @inheritDoc */
    public function setUp(): void
    {
        $this->emitter = new SapiEmitter();
    }

    /** @test */
    public function canDetectAlreadySentHeaders(): void
    {
        $this->expectException(HeadersAlreadySentException::class);

        $response = new Response();
        $this->emitter->emit($response);
    }

    /** 
     * @test 
     * @runInSeparateProcess
     */
    public function canEmit(): void
    {
        $response = (new Response())
            ->withStatus(200)
            ->withAddedHeader('Content-Type', 'text/plain');
        $response->getBody()->write('Content!');
        $this->emitter->emit($response);
        $this->expectOutputString('Content!');
    }
}
