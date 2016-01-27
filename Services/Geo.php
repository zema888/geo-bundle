<?php
/*
 * The MIT License
 *
 * Copyright 2016 Sergey Ageev (Cimus).
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Cimus\GeoBundle\Services;

use Cimus\IpGeoBase\IpGeoBase;

/**
 * Description of Geo
 *
 * @author Sergey Ageev (Cimus <s_ageev@mail.ru>)
 */
class Geo
{
    /**
     *
     * @var \Cimus\IpGeoBase\IpGeoBase 
     */
    private $geoBase;
    
    /**
     * 
     * @param string $cacheDir
     */
    public function __construct($cacheDir)
    {
        $this->geoBase = new IpGeoBase($cacheDir);
    }
    
    /**
     * Ищет информацию о IP адресе и возвращет её
     * 
     * @param string $ip IP адрес в формате 127.0.0.1
     * @return array|null
     */
    public function search($ip)
    {
        return $this->geoBase->search($ip);
    }
    
    /**
     * Возвращает массив городов о которых есть информация в БД
     * 
     * @return array
     */
    public function listCity()
    {
        return $this->geoBase->listCity();
    }
}
