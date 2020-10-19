<?php

namespace Kuzman\AutoOrderCancel\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use \Kuzman\AutoOrderCancel\Cron\CancelOrders as CancelOrdersCron;

class CancelOrders extends Command
{
    /**
     * @var CancelOrdersCron
     */
    private $cron;

    /**
     * CancelOrders constructor.
     * @param TsuCron $cron
     * @param null $name
     */
    public function __construct(CancelOrdersCron $cron, $name = null)
    {
        $this->cron = $cron;
        parent::__construct($name);
    }

    /**
     * Standard
     */
    protected function configure()
    {
        $this->setName('kuzman:orders:cancel')
            ->setDescription('Kuzman cancel orders');

        parent::configure();
    }

    /**
     * Execute Method
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->cron->execute();
        $output->writeln('Done');
    }
}