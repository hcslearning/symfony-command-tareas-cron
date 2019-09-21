<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Tarea;

class TareasCronCommand extends Command {

    protected static $defaultName = 'app:tareas-cron';
    private $em;

    function __construct(EntityManagerInterface $em) {
        parent::__construct();
        $this->em = $em;
    }

    private function getEm(): EntityManagerInterface {
        return $this->em;
    }

    protected function configure() {
        $this
                ->setDescription('Ejecuta todas las tareas de mantención para programar vía CRON')
                ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
                ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $tarea = (new Tarea())
                ->setNombre("prueba")
                ->setComentario("ejecución: " . (new \DateTime('now'))->format('Y-m-d H:i:s'))
        ;
        $this->getEm()->persist($tarea);
        $this->getEm()->flush();

        $io->success('Se ha registrado en la BD');
    }

}
