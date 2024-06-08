<?php

/**
 * @copyright Copyright (c) 2015 Matthew Weier O'Phinney (https://mwop.net)
 * @license   http://opensource.org/licenses/BSD-2-Clause BSD-2-Clause
 *
 * @see https://github.com/phly/psr7examples/blob/master/src/CallbackStream.php
 */

namespace App;

use Psr\Http\Message\StreamInterface;

/**
 * Callback-based stream implementation.
 *
 * Wraps a callback, and invokes it in order to stream it.
 * Only one invocation is allowed; multiple invocations will return an empty
 * string for the second and subsequent calls.
 */
class CallbackStream implements StreamInterface
{
    /** @var callable|null */
    private $callback;

    /** Whether the callback has been previously invoked. */
    private bool $called = false;

    /** @param callable $callback The callback function that echoes the body content */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    /** @return string */
    public function __toString()
    {
        return '';
    }

    /** Closes the stream and any underlying resources. */
    public function close() {}

    /**
     * Separates any underlying resources from the stream.
     *
     * After the stream has been detached, the stream is in an unusable state.
     *
     * @return resource|null Underlying PHP stream, if any
     */
    public function detach()
    {
        $this->callback = null;
        return null;
    }

    /**
     * Get the size of the stream if known.
     *
     * @return int|null returns the size in bytes if known, or null if unknown
     */
    public function getSize()
    {
        return null;
    }

    /**
     * Returns the current position of the file read/write pointer.
     *
     * @return int Position of the file pointer
     */
    public function tell()
    {
        return 0;
    }

    /**
     * Returns true if the stream is at the end of the stream.
     *
     * @return bool
     */
    public function eof()
    {
        return $this->called;
    }

    /**
     * Returns whether the stream is seekable.
     *
     * @return bool
     */
    public function isSeekable()
    {
        return false;
    }

    /**
     * Returns whether the stream is writable.
     *
     * @return bool
     */
    public function isWritable()
    {
        // This stream does not support writing operations.
        return false;
    }
}
