<?php

declare(strict_types=1);

namespace Infrastructure\Cli;

use Application\EventImporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class ImporterCommand extends Command
{
    /** @var EventImporter */
    private $eventImporter;

    public function __construct(EventImporter $eventImporter)
    {
        parent::__construct();

        $this->eventImporter = $eventImporter;
    }

    protected function configure() : void
    {
        $this
            ->setName('event:import')
            ->setDescription('Import past city events')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) : void
    {
        $output->writeln('<info>Import past events</info>');
        $count = $this->eventImporter->import();
        $output->writeln(sprintf('<info>%s imported events</info>', $count));
    }
}
