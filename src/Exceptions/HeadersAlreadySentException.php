<?php

declare(strict_types=1);

namespace PhpStandard\Emitter\Exceptions;

use Throwable;

use function sprintf;

/** @package PhpStandard\Emitter\Exceptions */
class HeadersAlreadySentException extends EmitterException
{
    /**
     * @param string $headersSentFile PHP source file name where output started in
     * @param int $headersSentLine Line number in the PHP source file name where
     * output started in
     * @param int $code
     * @param null|Throwable $previous
     * @return void
     */
    public function __construct(
        private string $headersSentFile,
        private int $headersSentLine,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $msg = sprintf('Headers already sent in file %s on line %s.', $headersSentFile, $headersSentLine);
        parent::__construct($msg, $code, $previous);
    }

    /**
     * Get pHP source file name where output started in.
     *
     * @return  string
     */
    public function getHeadersSentFile(): string
    {
        return $this->headersSentFile;
    }

    /**
     * Get line number in the PHP source file name where output started in
     *
     * @return  int
     */
    public function getHeadersSentLine(): int
    {
        return $this->headersSentLine;
    }
}
