<?php

/*  Copyright 2009-2011 Rafael Gutierrez Martinez
 *  Copyright 2012-2013 Welma WEB MKT LABS, S.L.
 *  Copyright 2014-2016 Where Ideas Simply Come True, S.L.
 *  Copyright 2017 nabu-3 Group
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

namespace providers\nabu\qrcode\renders;

use nabu\render\adapters\CNabuRenderInterfaceAdapter;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

use nabu\render\exceptions\ENabuRenderException;

/**
 * Class to Render a QR Code as an HTTP Response.
 * @author Rafael Gutierrez <rgutierrez@nabu-3.com>
 * @since 0.0.1
 * @version 0.0.1
 * @package \providers\nabu\qrcode\renders
 */
class CNabuQRCodeRenderInterface extends CNabuRenderInterfaceAdapter
{
    public function init()
    {
        $this->setSquareSize(400);

        return true;
    }

    public function finish()
    {
        return true;
    }

    public function render()
    {
        switch ($this->mimetype) {
            case 'image/svg+xml':
                $backend = new SvgImageBackEnd();
                break;
        }

        if (!isset($backend)) {
            throw new ENabuRenderException(ENabuRenderException::ERROR_INVALID_MIME_TYPE, array($this->mimetype));
        }

        $renderer = new ImageRenderer(
            new RendererStyle($this->getSquareSize()),
            new $backend
        );
        $writer = new Writer($renderer);
        $content = $this->getValue('content');
        echo $writer->writeString(is_string($content) ? $content : 'Copyright (c) 2018 nabu-3 Group');
    }

    /**
     * Gets the QR Content.
     * @return string|null Returns the content of the QR or null if not setted.
     */
    public function getContent()
    {
        return $this->getValue('content');
    }

    /**
     * Set or reset the QR Content.
     * @param  string|null $content The content to be setted or null to reset content.
     * @return CNabuQRCodeRenderInterface Returns the self pointer to grant chained setter calls.
     */
    public function setContent(string $content = null) : CNabuQRCodeRenderInterface
    {
        $this->setValue('content', $content);

        return $this;
    }

    /**
     * Gets the QR Square Size.
     * @return int Returns current Square Size.
     */
    public function getSquareSize() : int
    {
        return $this->getValue('square_size');
    }

    /**
     * Set the QR Square Size.
     * @param  int $size The size to be setted.
     * @return CNabuQRCodeRenderInterface Returns the self pointer to grant chained setter calls.
     */
    public function setSquareSize(int $size) : CNabuQRCodeRenderInterface
    {
        $this->setValue('square_size', $size);

        return $this;
    }
}
