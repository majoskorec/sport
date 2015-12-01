<?php

namespace Sport\Bundle\InstallerBundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Command\Command;

class InstallCommand extends Command
{

    /**
     * @var array
     */
    protected $commands = [
        [
            'command' => 'doctrine:database:drop',
            '--force' => true,
            '--if-exists' => true,
        ],
        [
            'command' => 'doctrine:database:create',
        ],
        [
            'command' => 'doctrine:schema:update',
            '--force' => true,
        ],
        [
            'command' => 'doctrine:fixtures:load',
        ],
        [
            'command' => 'cache:clear',
        ],
        [
            'command' => 'cache:clear',
            '--env' => 'prod',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName( 'sport:install' )
                ->setDescription( $this->getDesciptionText() )
        ;
    }

    /**
     * @return string
     */
    protected function getDesciptionText()
    {
        $text = "Install sport application";
        foreach ( $this->commands as $command ) {
            $text .= sprintf( "\n%42s- %s", " ", $this->getLineCommand( $command ) );
        }
        return $text;
    }

    /**
     * @param array $command
     * @return string
     */
    protected function getLineCommand( array $command )
    {
        $lineCommand = "";
        foreach ( $command as $key => $value ) {
            if ( $key == "command" ) {
                $lineCommand .= "$value";
            } elseif ( is_bool( $value ) ) {
                $lineCommand .= " $key";
            } else {
                $lineCommand .= " $key=$value";
            }
        }
        return $lineCommand;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute( InputInterface $input, OutputInterface $output )
    {
        foreach ( $this->commands as $command ) {
            $output->writeln( sprintf( "<comment>running command:</comment> <info>%s</info>", $this->getLineCommand( $command ) ) );
            $returnCode = $this->executeCommand( $input, $output, $command );
            if ( $returnCode === 1 ) {
                return;
            }
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return integer
     */
    protected function executeCommand( InputInterface $input, OutputInterface $output, array $commandArguments )
    {
        $command = $this->getApplication()->find( $commandArguments['command'] );
        $greetInput = new ArrayInput( $commandArguments );
        return $command->run( $greetInput, $output );
    }

}
