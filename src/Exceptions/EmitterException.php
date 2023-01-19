<?php

declare(strict_types=1);

namespace PhpStandard\Emitter\Exceptions;

use Exception;
use PhpStandard\Http\ResponseEmitter\Exceptions\EmitterExceptionInterface;

/** @package PhpStandard\Emitter\Exceptions */
class EmitterException extends Exception implements EmitterExceptionInterface
{
}
