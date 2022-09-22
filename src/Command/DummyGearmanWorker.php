<?php

namespace App\Command;

use GearmanJob;
use GearmanWorker;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('worker:dummy')]
class DummyGearmanWorker extends Command
{
    private const GEARMAN_TIMEOUT = 60;

    private const DUMMY_QUEUE = 'DUMMY_QUEUE';

    private const CHAT_GEARMAN_HOST = 'chat-gearman';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $gearman = new GearmanWorker();
        $gearman->addServer(self::CHAT_GEARMAN_HOST);
        $gearman->setTimeout(self::GEARMAN_TIMEOUT * 1000);
        $gearman->addFunction(
            self::DUMMY_QUEUE,
            function (GearmanJob $job) use ($output) {
                $output->writeln('DUMMY QUEUE DONE');
            }
        );

        while ($gearman->work()) {
        }

        return Command::SUCCESS;
    }
}
