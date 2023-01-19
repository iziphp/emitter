<?php

declare(strict_types=1);

namespace PhpStandard\Emitter\Exceptions;

use PhpStandard\Http\ResponseEmitter\Exceptions\PreviousOutputExceptionInterface;

/** @package PhpStandard\Emitter\Exceptions */
class PreviousOutputException extends EmitterException implements
    PreviousOutputExceptionInterface
{
}
