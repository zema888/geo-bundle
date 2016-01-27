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

namespace Cimus\GeoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Cimus\IpGeoBase\Util\IpGeoBaseUtil;

/**
 * @author Sergey Ageev (Cimus <s_ageev@mail.ru>)
 */
class UpdateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cimus:geo:update')
            ->setDescription('Обнавляет базу IP адресов')
            ->setHelp(<<<EOF
Команда <info>%command.name%</info> обнавляет базу IP адресов

Пример вызова
<info>php %command.full_name%</info>
EOF
            );
    }
    
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Start Update</info>');
        
        $path = $this->getContainer()->getParameter('cimus.geo.cache_dir');
        $geoBaseUtil = new IpGeoBaseUtil($path);
        
        $output->writeln('<info>Load new archive</info>');
        $geoBaseUtil->loadArchive($path);
        
        $output->writeln('<info>Convert in binary format</info>');
        $geoBaseUtil->convertInBinary($path);
        
        $output->writeln('<info>Done</info>');
    }
    
    
    
}
