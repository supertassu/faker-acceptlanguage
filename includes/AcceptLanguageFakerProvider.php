<?php
/**
 * MIT License
 *
 * Copyright (c) 2020 Taavi Väänänen
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Taavi\FakerAcceptLanguage;

use Faker\Provider\Base;

class AcceptLanguageFakerProvider extends Base
{
    /**
     * Create a sample Accept-Language header.
     * @return string
     */
    public function acceptLanguage()
    {
        $header = $this->acceptLanguageCode();
        $separator = $this->generator->boolean() ? ', ' : ',';

        $shouldWeight = $this->generator->boolean();
        $weight = 0.9;

        for ($i = 0; $i < $this->generator->numberBetween(0, 3); $i++) {
            $header .= $separator . $this->acceptLanguageCode();
            if ($shouldWeight) {
                $header .= ';q=' . $weight;
                $weight -= 0.1;
            }
        }

        return $header;
    }

    /**
     * Create a language code that can be used in an Accept-Language header
     * @return string
     * @example en-US; fi
     */
    public function acceptLanguageCode()
    {
        return $this->generator->boolean()
            ? $this->generator->languageCode()
            : $this->generator->languageCode() . '-' . $this->generator->countryCode();
    }
}
