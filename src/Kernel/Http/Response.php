<?php

/*
 * This file is part of the caikeal/oa-tapd-api.
 * (c) caikeal <caikeal@qq.com>
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace OaTapdApi\Kernel\Http;

use GuzzleHttp\Psr7\Response as GuzzleResponse;
use Illuminate\Support\Collection;
use OaTapdApi\Kernel\Exceptions\TapdResponseException;
use OaTapdApi\Kernel\Support\XML;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Response.
 */
class Response extends GuzzleResponse
{
    /**
     * @return string
     */
    public function getBodyContents()
    {
        $this->getBody()->rewind();
        $contents = $this->getBody()->getContents();
        $this->getBody()->rewind();

        return $contents;
    }

    /**
     * @param ResponseInterface $response
     *
     * @return Response
     */
    public static function buildFromPsrResponse(ResponseInterface $response)
    {
        return new static(
            $response->getStatusCode(),
            $response->getHeaders(),
            $response->getBody(),
            $response->getProtocolVersion(),
            $response->getReasonPhrase()
        );
    }

    /**
     * Build to json.
     *
     * @return string
     * @throws TapdResponseException
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Build to array.
     *
     * @return array
     * @throws TapdResponseException
     */
    public function toArray()
    {
        $content = $this->removeControlCharacters($this->getBodyContents());
        if (false !== stripos($this->getHeaderLine('Content-Type'), 'xml')) {
            return XML::parse($content);
        }
        $array = json_decode($content, true, 512, JSON_BIGINT_AS_STRING);

        if (!is_array($array)) {
            throw new TapdResponseException($content);
        }

        if (JSON_ERROR_NONE === json_last_error()) {
            return (array) $array;
        }

        return [];
    }

    /**
     * Get collection data.
     * @throws TapdResponseException
     */
    public function toCollection()
    {
        return new Collection($this->toArray());
    }

    /**
     * @return object
     * @throws TapdResponseException
     */
    public function toObject()
    {
        return json_decode($this->toJson());
    }

    /**
     * @return bool|string
     */
    public function __toString()
    {
        return $this->getBodyContents();
    }

    /**
     * @param string $content
     *
     * @return string
     */
    protected function removeControlCharacters(string $content)
    {
        return \preg_replace('/[\x00-\x1F\x80-\x9F]/u', '', $content);
    }
}
