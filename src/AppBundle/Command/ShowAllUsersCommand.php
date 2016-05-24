<?php
/**
 * Created by PhpStorm.
 * User: cdpn
 * Date: 24/05/16
 * Time: 16:40
 */
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use UserSvcBundle\Schema\Schema;

class ShowAllUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('user:list')
            ->setDescription('list all users register in db')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Schema $service */
        $service = $this->getContainer()->get('usersvc_schema');
        $users = $service->getUsers();

        if(count($users))
        {
            foreach ($users as $user)
            {
                $output->writeln($user);
            }
        }
        else{
            $output->writeln("pas d'utilisateur !");
        }
    }
}
