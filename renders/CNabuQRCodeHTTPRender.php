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

use nabu\http\interfaces\INabuHTTPResponseRender;

use nabu\http\app\base\CNabuHTTPApplication;

use nabu\http\renders\base\CNabuHTTPResponseRenderAdapter;

/**
 * Class to render a QRCode as HTTP response.
 * @author Rafael Gutierrez <rgutierrez@nabu-3.com>
 * @since 0.0.1
 * @version 0.0.1
 * @package providers\nabu\qrcode\renders
 */
class CNabuQRCodeHTTPRender extends CNabuHTTPResponseRenderAdapter
{

    public function __construct(
        CNabuHTTPApplication $nb_application,
        INabuHTTPResponseRender $main_render = null
    ) {
        parent::__construct($nb_application, $main_render);
    }

    public function render()
    {
        echo 'QR Code render';
    }
}
