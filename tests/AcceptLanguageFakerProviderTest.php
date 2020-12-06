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

namespace Test\Taavi\FakerAcceptLanguage;

use Faker\Factory;
use PHPUnit\Framework\TestCase;
use Taavi\FakerAcceptLanguage\AcceptLanguageFakerProvider;

class AcceptLanguageFakerProviderTest extends TestCase
{
    /**
     * @test
     * @covers AcceptLanguageFakerProvider::acceptLanguage
     * @covers AcceptLanguageFakerProvider::acceptLanguageCode
     */
    public function test_it_works_properly()
    {
        $faker = Factory::create();
        $faker->seed(1);
        $faker->addProvider(new AcceptLanguageFakerProvider($faker));

        for ($i = 0; $i < 10; $i++) {
            $a = $faker->acceptLanguage;
            $this->assertMatchesRegularExpression('/[a-z]{2,3}(\-[A-Z]{2,3})?(, ?[a-z]{2,3}(\-[A-Z]{2,3})?(;q=0,[0-9])?)*/', $a);
        }
    }
}
